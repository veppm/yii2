<?php

namespace app\controllers;

use Yii;
use app\components\AccessRule;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\admin\ContactForm;

use app\models\Role;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
			'access' => [
                'class' => AccessControl::className(),
			    'ruleConfig' => [
			        'class' => AccessRule::className(),
			    ],
			    'rules' => [
			        [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
			        [
			            'actions' => ['index','about','contact'],
			            'allow' => true,
			            'roles' => ['@','?'],
			        ],
			    ],
			],
        ];    
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(!\Yii::$app->user->isGuest && Role::getRoleName()==='admin'){
            return $this->redirect(['user/admin/index']);
        } 
        return $this->render('index');
    }
    
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm(); 
        if ($model->load(\Yii::$app->request->post()) && $model->validate() && $model->contact(\Yii::$app->params['adminEmail'])) {
            $model->created_at = time();
            $model->save();
            // $model->contact(\Yii::$app->params['adminEmail']);
            \Yii::$app->session->setFlash('contactusmsg', \Yii::t('user', '<div class="alert alert-success fade in alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Thank you for contact us, We will contact you soon</div>'));
            return $this->redirect(\Yii::$app->request->referrer);
            exit;
        }
        \Yii::$app->session->setFlash('contactusmsg', '<div class="alert alert-danger fade in alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Please enter valid data!!</div>');
        return $this->goHome(); // $this->redirect(\Yii::$app->request->referrer);
        exit;
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    /* public function actionAbout()
    {
        return $this->render('about');
    } */
}

