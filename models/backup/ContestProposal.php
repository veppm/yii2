<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Contest;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class ContestProposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contest_proposal';
    }


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['comment','contest_id'], 'required'], 
            
        ];
    }

    /**
     * @return array customized attribute labels
    */

    public function attributeLabels() {
        return [
          'comment'    => 'comment',
          'contest_id' => 'contest_id' 
        ];
    }
    
    public static function countProposals($contestId=0)
    {
      return static::find()->where(['contest_id'=>$contestId])->count();
    }  
}
