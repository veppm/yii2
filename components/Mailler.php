<?php

namespace app\components;
 


use Yii;
use yii\base\Component;
 

class Mailler extends Component
{
    /** @var string */
    public $viewPath = '@app/mail';

    /** @var string|array Default: `Yii::$app->params['adminEmail']` OR `no-reply@example.com` */
    public $sender;

    /** @var \yii\mail\BaseMailer Default: `Yii::$app->mailer` */
    public $mailerComponent;

    /**
     * @return string
     */
    public $getSubject;


    /**
     * @param string $subject
     */
    public function getSubject($subject)
    {
        if ($this->getSubject == null) {
            $this->setSubject(Yii::t('user', $subject.' on {0}', Yii::$app->name));
        }

        return $this->getSubject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->getSubject = $subject;
    }


    /**
     * Sends an email to a user with recovery link.
     *
     * @param User  $user
     * @param Token $token
     *
     * @return bool
     */
    public function sendSuccessPaymentMessage($to, $data, $userType='user')
    {
        return $this->sendMessage(
            $to,
            $this->getSubject('Contest payment confimation'),
            'success-payment',
            ['payment' => $data, 'userType' => $userType]
        );
    }


    /**
     * Sends an email to a user with recovery link.
     *
     * @param User  $user
     * @param Token $token
     *
     * @return bool
     */
    public function sendMailAdminDashboard($to, $records)
    {
        return $this->sendMessage(
            $to,
            $this->getSubject($records['subject']),
            'admin/mail-from-dashboard',
            ['record' => $records]
        );
    }

    /**
     * @param string $to
     * @param string $subject
     * @param string $view
     * @param array  $params
     *
     * @return bool
     */
    protected function sendMessage($to, $subject, $view, $params = [])
    {
        $mailer = $this->mailerComponent === null ? Yii::$app->mailer : Yii::$app->get($this->mailerComponent);
        $mailer->viewPath = $this->viewPath;
        $mailer->getView()->theme = Yii::$app->view->theme;

        if ($this->sender === null) {
            $this->sender = isset(Yii::$app->params['adminEmail']) ?
                Yii::$app->params['adminEmail']
                : 'no-reply@example.com';
        }

        //return $mailer->compose(['html' => $view, 'text' => 'text/' . $view], $params)
        return $mailer->compose(['html' => $view], $params)
            ->setTo($to)
            ->setFrom($this->sender)
            ->setSubject($subject)
            ->send();
    }
}