<?php

namespace app\models;

use Yii;
use yii\base\Model;
use dektrium\user\models\LoginForm as BaseLoginForm;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends BaseLoginForm
{
    /** @inheritdoc */
    public function attributeLabels()
    {
        return [
            'login'      => Yii::t('user', 'Login'),
            'password'   => Yii::t('user', 'Password'),
            'rememberMe' => Yii::t('user', 'Remember'),
        ];
    }
}
