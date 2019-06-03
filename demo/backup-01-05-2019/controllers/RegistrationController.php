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

use app\models\RegistrationForm;
use dektrium\user\controllers\RegistrationController as BaseRegistrationController;

/**
 * Registration controller to display registration form, validates.
 *
 * @author Virtual Employee <info@virtualemployee.com>
 */

class RegistrationController extends BaseRegistrationController
{

    /**
     * {@inheritdoc}
    */
    public function actionRegister()
    {
        if (!$this->module->enableRegistration) {
            throw new NotFoundHttpException();
        }
        
        /** @var RegistrationForm $model */
        $model = \Yii::createObject(RegistrationForm::className());
        $event = $this->getFormEvent($model);
        $this->trigger(self::EVENT_BEFORE_REGISTER, $event);
        $this->performAjaxValidation($model);
        if ($model->load(\Yii::$app->request->post()) && $model->register()) {
            $this->trigger(self::EVENT_AFTER_REGISTER, $event);
            \Yii::$app->session->setFlash('info',\Yii::t('user','Your account has been created and a message with further instructions has been sent to your email')); 
            return $this->refresh();
        }
        return $this->render('register', [
            'model'  => $model,
            'module' => $this->module,
        ]);
    }

}
