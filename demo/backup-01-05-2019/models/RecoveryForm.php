<?php

namespace app\models;

use dektrium\user\Finder;
use dektrium\user\Mailer;
use yii\base\Model;
use app\models\Token;
use dektrium\user\models\RecoveryForm as BaseRecoveryForm;

class RecoveryForm extends BaseRecoveryForm
{
    /**
     * Sends recovery message.
     *
     * @return bool
     */
    public function sendRecoveryMessage()
    {
        if (!$this->validate()) {
            return false;
        }

        $user = $this->finder->findUserByEmail($this->email);
        if ($user instanceof User) {
            /** @var Token $token */
            $token = \Yii::createObject([
                'class' => Token::className(),
                'user_id' => $user->id,
                'type' => Token::TYPE_RECOVERY,
            ]);

            if (!$token->save(false)) {
                return false;
            }

            if (!$this->mailer->sendRecoveryMessage($user, $token)) {
                return false;
            }
        }

        \Yii::$app->session->setFlash(
            'info',
            \Yii::t('user', 'An email has been sent with instructions for resetting your password')
        );

        return true;
    }

    
}
