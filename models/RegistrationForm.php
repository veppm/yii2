<?php

/*
 * This file is part of the Virtual Employee Project.
 *
 * (c) Virtual Employee Project <https://www.virtualemployee.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\models;
use Yii;
use yii\base\Model;
use app\models\User;
use dektrium\user\Module;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
/**
 * Registration form collects user input on registration process, validates it and creates new User model.
 *
 * @author Virtual Employee <info@virtualemployee.com>
 */
class RegistrationForm extends BaseRegistrationForm
{

    public $phone_number;
    public $password_repeat;
    public $role;


    public function rules()
    {
        $rules   = parent::rules();
        $rules[] = ['role', 'required'];
        // $rules[] = ['last_name', 'string', 'max' => 255];
        // $rules[] = ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match"];
        return $rules;
    }

    /**
     * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
            'email'    => Yii::t('user', 'Email'),
            'username' => Yii::t('user', 'Username'),
            'password' => Yii::t('user', 'Password'),
            'role'     => Yii::t('user', 'Register as ')
        ];
    }

    



    /**
     * {@inheritdoc}
    */
    public function register()
    {
        if ($this->validate()) {
            $user = \Yii::createObject(User::className());
            $user->role = $this->attributes['role'];
            $user->setScenario('register');              
            $this->loadAttributes($user);
            return $user->register();
        }
       return false;
    } 




    
}
