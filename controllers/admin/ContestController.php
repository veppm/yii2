<?php

namespace app\controllers\admin;

use Yii;
use app\models\Role;
use app\models\ContestForm;
use app\models\admin\ContestSearch;
use app\models\admin\TransactionSearch;
use app\models\admin\ProposalSearch;
use app\models\ContestProposal;
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
                        'roles' => ['admin'],
                    ],
		        ],
            ],
        ];
    } 


    /**
     * Lists all Contest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContestSearch();  
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

 	public function actionTransactionList()
    {
        $searchModel = new TransactionSearch();  
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('transaction-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionProposalList()
    {
    	$params = \Yii::$app->request->get();
    	if(!isset($params['contest-proposal']) || $params['contest-proposal']<=0){
    		return $this->redirect(['/user/admin']);
    	}

        $searchModel = new ProposalSearch();  
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        return $this->render('proposal-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDelete($id)
    {
        \Yii::$app->db->createCommand()->delete(ContestForm::tableName(), ['id' => $id])->execute();
        \Yii::$app->db->createCommand()->delete(ContestProposal::tableName(), ['contest_id' => $id])->execute();
        \Yii::$app->db->createCommand()->delete(TransactionDetails::tableName(), ['contest_id' => $id])->execute();
        \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'Contest has been deleted'));
        return $this->redirect(['index']);
    }

    /**
     * Display contest details
     * 
     */
    public function actionContestInformation(){
        $contest = Yii::$app->request->get('contest-proposal');
        if(empty($contest)){
            return $this->goHome();
        }
        $model = ContestForm::findOne($contest);
        return $this->render('contest-information', ['model' => $model]);
    }


    


}
