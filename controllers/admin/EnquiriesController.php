<?php

namespace app\controllers\admin;

use Yii;
use app\models\Competition;
use app\models\Role;
use app\models\admin\EnquiriesSearch;
use app\models\admin\ContactForm;
use app\components\AccessRule;
use yii\filters\AccessControl;
use yii\behaviors\TimestampBehavior;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\ActiveRecord as ActiveRecord;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * CompetitionController implements the CRUD actions for Competition model.
 */
class EnquiriesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
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
                        'allow' => true,
                        'roles' => ['admin'],
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
        $searchModel = new EnquiriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionDelete($id)
    {
        \Yii::$app->db->createCommand()->delete(ContactForm::tableName(), ['id' => $id])->execute();
        \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'Enquiry has been deleted'));
        return $this->redirect(['index']);
    }

}
