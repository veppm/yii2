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
    //public $first_name;
    //public $last_name;
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
     * {@inheritdoc}
    */
    public function register()
    {
        if ($this->validate()) {
            // $user = new User();
            $user = \Yii::createObject(User::className());
            // $user->role = '3';
            $user->setScenario('register');              
            $this->loadAttributes($user);
            return $user->register();
        }
       return false;
    } 




    
}
