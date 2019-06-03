<?php

namespace app\controllers;

use Yii;
use app\models\Competition;
use app\models\Role;
use app\models\CompetitionSearch;
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
class CompetitionController extends Controller
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
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => ['create','update','delete','view'],
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
        $searchModel = new CompetitionSearch();
        $userId = (Role::getRoleName()==='admin') ? 'admin' : Yii::$app->user->getId();  
        $dataProvider = $searchModel->search($userId, Yii::$app->request->queryParams);
        $pageName = (Role::getRoleName()==='admin') ? 'admin/index' : 'index';
        return $this->render($pageName, [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Competition model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $pageName = (Role::getRoleName()==='admin') ? 'admin/view' : 'view';
        return $this->render($pageName, [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Creates a new Competition model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Competition();
        $model->user_id = Yii::$app->user->getId();
        $model->updated_at = time();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Competition model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->updated_at = time();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $pageName = (Role::getRoleName()==='admin') ? 'admin/update' : 'view';
        return $this->render($pageName, [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Competition model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        // $array = (Role::getRoleName()!=='admin') ? ['id'=>$id] : ['id'=>$id,'user_id'=>Yii::$app->user->getId()];
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Competition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Competition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Competition::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
