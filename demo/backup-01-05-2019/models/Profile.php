<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\models;

use Yii;
use dektrium\user\traits\ModuleTrait;
use yii\db\ActiveRecord;
use yii\db\Query;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string  $name
 * @property string  $public_email
 * @property string  $gravatar_email
 * @property string  $gravatar_id
 * @property string  $location
 * @property string  $website
 * @property string  $bio
 * @property string  $timezone
 * @property User    $user
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com
 */

 use dektrium\user\models\Profile as BaseProfile;
class Profile extends BaseProfile
{
    
    public $image;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules   = parent::rules();
        $rules[] =  ['image', 'file', 'skipOnEmpty' => true];
        return $rules;
    }

    /**
     * Upload profile image
    */
    public function upload($userId)
    {
       if($this->image!==null){
            $fileName = '';
            $folder   = 'profile-image';
            $directory = Yii::getAlias('@app/web/'.$folder);
            if ($this->validate()) { 
                $fileName = $this->image->baseName.'-'.time().'.'.$this->image->extension;
                $this->image->saveAs($directory.'/'.$fileName);
                Yii::$app->db->createCommand("UPDATE profile SET image='".$folder.'/'.$fileName."' WHERE user_id='".$userId."'")->execute();
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Get profile image
    */
    public static function getProfileImage($userId=null)
    {
        $id = ($userId!==null) ? $userId : Yii::$app->user->getId();
        $result = (new Query())->from('profile')->select('image')->where(['user_id'=>$id])->one();
        $image = 'profile-image/blank.png';
        if($result!==false) {
            $image = (file_exists(Yii::getAlias('@app/web').'/'.$result['image']) && $result['image']!==null) ? $result['image'] : $image;
        } 
        return $image;  
    }



    
}
