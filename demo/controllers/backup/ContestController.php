<?php

namespace app\controllers;

use Yii;
use app\models\Role;
use app\models\ContestForm;
use app\models\ContestProposal;
use app\models\ProposalSearch;
use app\models\TransactionDetails;
use app\components\AccessRule;
use yii\filters\AccessControl;
use yii\behaviors\TimestampBehavior;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\ActiveRecord as ActiveRecord;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\BlameableBehavior;
use yii\web\UploadedFile;
use yii\db\Query;
use yii\data\Pagination;
/**
 * CompetitionController implements the CRUD actions for Competition model.
 */
class ContestController extends Controller
{
    /**
     * {@inheritdoc}
     */
     public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'message',
                'immutable' => true,
                'ensureUnique'=>true,
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],

            'access' => [
                'class' => AccessControl::className(),
			    'ruleConfig' => [
			        'class' => AccessRule::className(),
			    ],
			    'rules' => [
                    [
                        //'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
		        ],
            ],
        ];
    } 

    /**
     * Lists all Competition models.
     * @return mixed
     */
    public function actionIndex()
    {

        $model = new ContestForm();
        if ($model->load(\Yii::$app->request->post())) { // 
            /*move file*/
            $model->sketches = UploadedFile::getInstance($model, 'sketches');
            if($model->validate() && $model->sketches){
                if($model->sketches!==null){
                    //$sketchesName = $model->sketches->baseName.'-'.time().'.'.$model->sketches->extension;
                    $sketchesName = $model->sketches->baseName.'.'.$model->sketches->extension;
                    $folder   = 'sketch-files';
                    $directory = Yii::getAlias('@app/web/'.$folder);
                    $model->sketches->saveAs($directory.'/'.$sketchesName);
                    // $model->sketches      = $sketchesName;
                }
                $model->inspiration        = implode('||', $model->inspiration);
                $model->building_site      = implode('||', $model->building_site);
                $model->materials_finishes = implode('||', $model->materials_finishes);

                $model->user_id = Yii::$app->user->getId();
                $orderId  = rand(1,100000000).''.Yii::$app->user->getId().''.time();
                $model->order_id = $orderId;
                $model->created_at = time();
                $model->updated_at = time();
                if($model->save()){
                    // \Yii::$app->session->setFlash('success',\Yii::t('user','Records has been saved successfully!!')); 
                    $params = [
                        'method'=>'paypal',
                        'intent'=>'sale',
                        'order'=>[
                            'description'=> 'Test payment||'.$model->id.'||'.$orderId,
                            'subtotal'=>10,
                            'shippingCost'=>0,
                            'total'=>10,
                            'currency'=>'USD',
                            'items'=>[
                                [
                                    'name'=>'Item one',
                                    'price'=>5,
                                    'quantity'=>1,
                                    'currency'=>'USD'
                                ],
                                [
                                    'name'=>'Item two',
                                    'price'=>5,
                                    'quantity'=>1,
                                    'currency'=>'USD'
                                ],

                            ]
                        ]
                    ];
                    Yii::$app->PayPalRestApi->checkOut($params);
                } 
            }
        }

        return $this->render('index',['model'=>$model]);
    }


    public function actionSuccess()
    {
        // Setup order information array 
        $params = [
            'order'=>[
                'description'=>'na',
                'subtotal'=>0,
                'shippingCost'=>0,
                'total'=>0,
                'currency'=>'USD',
            ]
        ];

        // In case of payment success this will return the payment object that contains all information about the order
        // In case of failure it will return Null
        $result = false;
        $result = Yii::$app->PayPalRestApi->processPayment($params);
        $message = "Payment declined!!";
        $info    = 'info';
        if($result!==false){
            $transaction = $result->getTransactions();
            if(!empty($transaction[0]->description)){
                $explode  = explode('||',$transaction[0]->description);
                $id       = $explode['1'];
                $orderId  = $explode['2'];
                $contest  = ContestForm::findOne(['id'=>$id,'order_id'=>$orderId]);
                if($contest->payment_status!='success'){
                    $payment_date = time();
                    $update = \Yii::$app->db->createCommand("UPDATE contest SET payment_status='success',payment_date='".$payment_date."' WHERE id='".$id."' and order_id='".$orderId."'")->execute();
                    // if ($update) {
                        $transactionDel = new TransactionDetails();
                        $transactionDel->contest_id = $id;
                        $transactionDel->order_id   = $orderId;
                        $transactionDel->transanction_id    = $result->getId();
                        $transactionDel->transaction_amount = $transaction[0]->amount->total;
                        $transactionDel->payment_status = 'success';
                        $transactionDel->payment_date   = $payment_date;
                        $transactionDel->paypal_records = print_r($result, true); 
                        $transactionDel->save();
                        $message = "Payment successed!!";
                        $info = 'success';
                    // }
                   return $this->redirect(['cms-pages/paypal?success=true&paymentId='.$result->getId()]);
                }
            }
            return $this->redirect(['cms-pages/paypal?success=true&paymentId='.$result->getId()]);
        }

        //\Yii::$app->session->setFlash($info,\Yii::t('user',$message)); 
        //return $this->redirect(['user/'.Yii::$app->user->getId()]); 
        return $this->redirect(['cms-pages/paypal?success=false']); 
    }

    public function actionBrowseContest()
    {
        $searchby =\Yii::$app->request->get('searchby');
        $searchkey =\Yii::$app->request->get('searchkey');
        $orderby  = SORT_DESC;
        if(in_array($searchby, ['asc','desc'])){
            $orderby=($searchby=='asc') ? SORT_ASC : SORT_DESC;
        } 

        $query  = ContestForm::find()
                // ->where(['user_id' => Yii::$app->user->getId()])
                ->orderBy(['created_at'=>$orderby,'approximate_budjet'=>$orderby]); 
        if($searchkey!=''){
            $query = $query->andWhere(['like', 'contest_title', $searchkey]);
        }

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=>10]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('browse-contest', ['models' => $models,'pages' => $pages]);
    }


    public function actionContestInformation()
    {
        $contest = Yii::$app->request->get('contest-proposal');
        if(empty($contest)){
            return $this->goHome();
        }
        
        $model = ContestForm::findOne($contest);
        return $this->render('contest-information', ['model' => $model]);   
    }

    public function actionSubmitProposal()
    {
        $contest = Yii::$app->request->get('proposal_contest');
        if(empty($contest)){
            return $this->goHome();
        }

        $formdata  = new ContestProposal();
        $postData  = \Yii::$app->request->post();
        if ($formdata->load($postData)) { 
            $formdata->design_files = UploadedFile::getInstance($formdata, 'design_files');
            if($formdata->validate()){
                if($this->validateProposal($postData['ContestProposal']['contest_id'], \Yii::$app->user->getId())>0){
                    \Yii::$app->session->setFlash('danger',\Yii::t('user','You have already sent proposal!!')); 
                    return $this->refresh();
                }

                if($formdata->design_files!==null){
                    $fileName = $formdata->design_files->baseName.'.'.$formdata->design_files->extension;
                    $folder   = 'proposal-files';
                    $directory = Yii::getAlias('@app/web/'.$folder);
                    $formdata->design_files->saveAs($directory.'/'.$fileName);
                }

                $formdata->contest_id  = $postData['ContestProposal']['contest_id'];
                $formdata->user_id     = \Yii::$app->user->getId();
                $formdata->created_at  = time();
                $formdata->updated_at  = time();
                $formdata->save();
                \Yii::$app->session->setFlash('success',\Yii::t('user','Your proposal has been sent successfully!!'));
                return $this->redirect(['/contest/contest-information?contest='.$formdata->contest_id]);
                // return $this->refresh();
            }

            $model = ContestForm::findOne($contest);
            return $this->render('submit-proposal', ['model' => $model, 'formdata'=>$formdata]);
        }

        $model = ContestForm::findOne($contest);
        return $this->render('submit-proposal', ['model' => $model, 'formdata' => $formdata]); 
    }


    public function actionProposals()
    {

        $contestId = \Yii::$app->request->get('contest-proposal');
        if(empty($contestId)){
            return $this->goHome();
        }

        $id = Yii::$app->user->getId();
        $query = new Query;
        $proposals  = $query->select(['con.*', 'cp.id as cp_id', 'cp.comment', 'cp.design_files', 'cp.created_at as cp_created_at', '(con.created_at+(con.contest_duration*86400)) as enddate'])  
                ->from('contest as con')
                ->InnerJoin('contest_proposal as cp', 'cp.contest_id=con.id')
                ->where(['con.user_id'=>$id, 'con.id'=>$contestId])
                ->all();

        return $this->render('proposals', ['proposals'=>$proposals]);
        // \Yii::$app->session->setFlash('info',\Yii::t('user','Work is in under process!!'));
        // return $this->redirect(Yii::$app->request->referrer);      
    }


    public function actionWonProposal()
    {
        $id = \Yii::$app->request->get('contest-proposal');
        $contestId = \Yii::$app->request->get('contest');

        if(empty($id) || empty($contestId)){
            return $this->goHome();
        }

        $connection = Yii::$app->db;
        $connection->createCommand()->update('contest_proposal', ['user_won' =>'1'], ['id'=>$id, 'contest_id'=>$contestId, 'user_won'=>'0'])
                    // ->where(['id'=>$id, 'contest_id'=>$contestId, 'user_won'=>'0'])
                    ->execute();
        \Yii::$app->session->setFlash('success',\Yii::t('user','Your request has been submitted successfully!!'));
        return $this->goBack();
        exit;
    }
    


    protected function validateProposal($contestId, $userId)
    {
        return ContestProposal::find()->where(['contest_id'=>$contestId, 'user_id'=>$userId])->count();
    }




}
