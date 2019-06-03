<?php
/*
 * This file is part of the Virtual Employee Project.
 *
 * (c) Virtual Employee Project <https://www.virtualemployee.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\controllers;

use app\models\LoginForm;
use app\models\Role;
use dektrium\user\controllers\SecurityController as BaseSecurityController;
/**
 * Controller that manages user authentication process.
 *
 * @property Module $module
 *
 * @author Virtual Employee <info@virtualemployee.com>
 */
class SecurityController extends BaseSecurityController
{
 
    /**
     * Displays the login page.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            $this->goHome();
        }
        /** @var LoginForm $model */
        $model = \Yii::createObject(LoginForm::className());
        $event = $this->getFormEvent($model);
        $this->performAjaxValidation($model);
        $this->trigger(self::EVENT_BEFORE_LOGIN, $event);
        if ($model->load(\Yii::$app->getRequest()->post()) && $model->login()) {
            $this->trigger(self::EVENT_AFTER_LOGIN, $event);
            switch(Role::getRoleName())
            {
                case 'admin':
                    return $this->redirect(['/user/admin']);
                    break;
                default:
                    return $this->redirect(['/user/'.\Yii::$app->user->getId()]);
                    break;
            }
            return $this->goBack();
        }
        return $this->render('login', [
            'model'  => $model,
            'module' => $this->module,
        ]);
    }

    

}
