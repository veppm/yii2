<?php

namespace app\controllers;

use Yii;
use app\components\AccessRule;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use app\models\Role;


class CmsPagesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    /*public function behaviors()
    {
        return [
			'access' => [
                'class' => AccessControl::className(),
			    'ruleConfig' => [
			        'class' => AccessRule::className(),
			    ],
			    'rules' => [
			        [
                        //'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@','?'],
                    ],
			    ],
			],
        ];    
    }*/



    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Display How-It-Works page.
     *
     * @return string
     */
    public function actionHowItWorks(){
        return $this->render('how-it-works');
    }
    
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }


    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionPrivacyPolicy()
    {
        return $this->render('privacy-policy');
    }


    public function actionPaypal()
    {
        return $this->render('paypal-success-decline');
    }
}
