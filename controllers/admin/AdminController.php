<?php

/*
 * This file is part of the Virtual Employee Project.
 *
 * (c) Virtual Employee Project <https://www.virtualemployee.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\controllers\admin;

use yii;
use app\models\User;
use app\models\admin\QuickMail;
use app\components\AccessRule;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\components\Mailler;

use dektrium\user\controllers\AdminController as BaseAdminController;

/**
 * Admin controller to perform many actions.
 *
 * @author Virtual Employee <info@virtualemployee.com>
 */

class AdminController extends BaseAdminController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete'          => ['post'],
                    'confirm'         => ['post'],
                    'resend-password' => ['post'],
                    'block'           => ['post'],
                    'switch'          => ['post'],
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
     * {@inheritdoc}
    */
    public function actionIndex()
    {
        $quickMail = new QuickMail(); 
        if ($quickMail->load(Yii::$app->request->post()) && $quickMail->validate()) {
            $mailer   = new Mailler(); 
            $mailData = ['subject' => $quickMail->subject, 'message' => $quickMail->message];
            if($mailer->sendMailAdminDashboard($quickMail->email, $mailData)){
                // $quickMail->created_at = time();
                // $quickMail->save();
                \Yii::$app->session->setFlash('success', \Yii::t('user', 'Your message has been sent successfully!!'));
                return $this->refresh();
            } 
            \Yii::$app->session->setFlash('danger', \Yii::t('user', 'Please enter valid data!!'));
            return $this->refresh();
        }
        return $this->render('dashboard',['quickMail'=> $quickMail]);
    }

    /**
     * {@inheritdoc}
    */
    public function actionCreate()
    {
        return $this->goBack();
        // echo "=========";
        exit;
    }

    /**
     * Get List of users
    */
    public function actionUserList()
    {
        return parent::actionIndex();
    }

   



    
}
