<?php
 
namespace app\components;
 
use app\models\User;
use app\models\Role;
class AccessRule extends \yii\filters\AccessRule {
 
    /**
     * @inheritdoc
     */
    protected function matchRole($user)
    {
        $identity = \Yii::$app->user->identity;
        foreach ($this->roles as $role) {
            if ($role === '?') {
                if (\Yii::$app->user->isGuest) {
                    return true;
                }
            } elseif ($role === '@') {
                if (!\Yii::$app->user->isGuest) {
                    return true;
                }
            } elseif($identity!== null && $role === Role::getRoleName()) { 
                if (!\Yii::$app->user->isGuest && $identity->role) {
                    return true;
                }
            } 
            /* elseif ($user->can($role)) {
                return true;
            } */
        }
        return false;
    }
}