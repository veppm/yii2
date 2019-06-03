<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\Models\User;
use yii\db\Query;
class Role extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * Get role name
    */
    public static function getRoleName($displayname=null)
    {
        $roleId = (\Yii::$app->user->identity!==null) ? Yii::$app->user->identity->role : false;
        $result = (new Query())->from('role')->select('role_name,display_name')->where(['role_id'=>$roleId])->one();
        if($displayname==='display_name'){
            return ($result!==false) ? ucfirst($result['display_name']) : false;
        }
        return ($result!==false) ? ucfirst($result['role_name']) : false;
    }
    
}
