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
use app\components\AccessRule;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
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
        return $this->render('dashboard');
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
