<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Contest;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\helpers\Url;
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
            [['comment','contest_id'], 'required'],
            [['design_files'], 'file', 'skipOnEmpty' => false],  
        ];
    }

    public function attributeLabels() 
    {
      return [
        'comment'      => 'Comment',
        'contest_id'   => 'Contest Id',
        'design_files' => 'Upload file' 
      ];
    }  

    /*count proposal for a contest*/
    public static function countProposals($contestId=0)
    {
      return static::find()->where(['contest_id'=>$contestId])->count();
    }


    /*select all proposal for a contest for admin*/
    public static function getProposalList($contestId=53)
    {
      $query = new Query;
      return $query->select(['cp.*', 'con.contest_title','con.id as con_id','u.username', 'u.email'])  
              ->from('contest as con')
              ->InnerJoin('contest_proposal as cp', 'cp.contest_id=con.id')
              ->leftJoin('user as u', 'u.id=cp.user_id')
              ->where(['con.id'=>$contestId])
              ->orderBy(['cp.created_at' => SORT_DESC]); 
    }

}
