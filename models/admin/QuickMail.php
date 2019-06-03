<?php

namespace app\models\admin;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class QuickMail extends Model
{
    public $email;
    public $subject;
    public $message;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['email', 'subject','message'], 'required'],
            [['message'], 'string'],
            ['email', 'email'],
        ];
    }
}
