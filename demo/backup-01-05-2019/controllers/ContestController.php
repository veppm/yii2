<?php

namespace app\controllers;

use Yii;
use app\models\Role;
use app\models\ContestForm;
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
                    $sketchesName = $model->sketches->baseName.'-'.time().'.'.$model->sketches->extension;
                    $folder   = 'sketch-files';
                    $directory = Yii::getAlias('@app/web/'.$folder);
                    $model->sketches->saveAs($directory.'/'.$sketchesName);
                    // $model->sketches      = $folder.'/'.$sketchesName;
                }
                $model->inspiration        = implode('||', $model->inspiration);
                $model->building_site      = implode('||', $model->building_site);
                $model->materials_finishes = implode('||', $model->materials_finishes);

                /*End move file*/
                /*$orderId  = rand(1,100000000).''.Yii::$app->user->getId().''.time();
                $postData = \Yii::$app->request->post('ContestForm');
                $model->order_id = $orderId;
                $model->user_id = Yii::$app->user->getId();
                $model->inspiration   = (isset($postData['inspiration'])) ? implode('||', $postData['inspiration']) : '';
                $model->building_site = (isset($postData['building_site'])) ?  implode('||', $postData['building_site']) : '';
                $model->materials_finishes = (isset($postData['materials_finishes'])) ? implode('||', $postData['materials_finishes']) : ''; 
                $model->about_situation = (isset($postData['about_situation'])) ? $postData['about_situation'] : '';
                $model->about_situation_other = (!isset($postData['about_situation_other'])) ? $postData['about_situation_other'] : '';
                $model->about_family = (isset($postData['about_family'])) ? $postData['about_family'] : '';
                $model->about_family_other = (!isset($postData['about_family_other'])) ? $postData['about_family_other'] : '';
                $model->beds_no = (isset($postData['beds_no'])) ? $postData['beds_no'] : '';
                $model->bathrooms_no = (isset($postData['bathrooms_no'])) ? $postData['bathrooms_no'] : '';
                $model->living_spaces = (isset($postData['living_spaces'])) ? $postData['living_spaces'] : '';
                $model->additional_room = (isset($postData['additional_room'])) ? $postData['additional_room'] : '';
                $model->communicate_architects = (isset($postData['communicate_architects'])) ? $postData['communicate_architects'] : '';
                $model->approximate_budjet = (isset($postData['approximate_budjet'])) ? $postData['approximate_budjet'] : '';
                $model->looking_build = (isset($postData['looking_build'])) ? $postData['looking_build'] : '';
                $model->land_other_size = (isset($postData['land_other_size'])) ? $postData['land_other_size'] : '';
                $model->contest_title = (isset($postData['contest_title'])) ? $postData['contest_title'] : '';;
                $model->promote_contest = (isset($postData['promote_contest'])) ? $postData['promote_contest'] : '';
                $model->guaranteed_contest_option = (isset($postData['guaranteed_contest_option'])) ? $postData['guaranteed_contest_option'] : '';
                $model->name =  (isset($postData['name'])) ? $postData['name'] : '';
                $model->email =  (isset($postData['email'])) ? $postData['email'] : '';
                $model->phone =  (isset($postData['phone'])) ? $postData['phone'] : '';
                $model->hear_about_arkotte =  (isset($postData['hear_about_arkotte'])) ? $postData['hear_about_arkotte'] : '';*/


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
                ->where(['user_id' => Yii::$app->user->getId()])
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
        $model = ContestForm::findOne('2');
        return $this->render('contest-information', ['model' => $model]);
    }


}
