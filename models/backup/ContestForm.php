<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Contest;
use yii\db\ActiveRecord;
use yii\db\Query;

/**
 * ContactForm is the model behind the contact form.
 */
class ContestForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contest';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [[
              'inspiration', 
              'building_site', 
              'materials_finishes', 
              'about_situation',
              'about_family',
              'family_specific_need',
              'beds_no',
              'bathrooms_no',
              'living_spaces',
              'additional_room',
              'communicate_architects',
              'approximate_budjet',
              'looking_build',
              'land_other_size',
              'sketches',
              'contest_title',
              /*'promote_contest',*/
              'design_package',
             /* 'guaranteed_contest_option',*/
              'contest_duration',
              'name',
              'email',
              'phone',
              'hear_about_arkotte',
            ], 'required'],

            [['sketches'], 'file', 'skipOnEmpty' => false],
            // email has to be a valid email address
            [['email'], 'email'],
            [['about_situation_other', 'about_family_other','family_specific_need','living_spaces','additional_room','communicate_architects'], 'string', 'max' => 200],
            [['contest_title'],'string', 'max'=>100]
            
        ];
    }

    /**
     * @return array customized attribute labels
    */

    public function attributeLabels() {
        return [
          'inspiration'=>'Inspiration', 
          'building_site'=>'Building Site', 
          'materials_finishes'=>'Material and Finishes', 
          'about_situation'=>'Situation',
          'about_situation_other'=>'about_situation_other',
          'about_family'=>'Family',
          'about_family_other'=>'about_family_other',
          'family_specific_need'=>'Specific Need',
          'beds_no'=>'Bed No',
          'bathrooms_no'=>'Bathroom No',
          'living_spaces'=>'Living Spaces',
          'additional_room'=>'Additional Room',
          'communicate_architects'=>'Communicate Architects',
          'approximate_budjet'=>'Approximate Budjet($)',
          'looking_build'=>'Looking Build',
          'land_other_size'=>'Land Size',
          'sketches'=>'Sketche',
          'contest_title'=>'Contest Title',
          'promote_contest'=>'Promote Contest',
          'guaranteed_contest_option'=>'Guaranteed Contest Option',
          'contest_duration'=>'Contest Duration (Days)',
          'name'=>' Name',
          'email'=>'Email',
          'phone'=>'Phone',
          'hear_about_arkotte'=>'Hear About Arkotte',
          'status'=>'Status',
          'payment_status' =>'Payment Status',
          'payment_date'=> 'Payment Date',
          'design_package' =>'Design Package ($)',
        ];
    }

    
    public static function getBudget($budgetOrg='')
    {
      $price = '';
      if($budgetOrg!=''){
        $explode = explode('-', $budgetOrg);
       
        if(isset($explode[1])){
            $price = '$'.$explode[0].' - $'.$explode[1];
        } else {
            $price = (strpos($budgetOrg,'<')===false) ? str_replace('>', 'Above $',$budgetOrg) : str_replace('<',' Under $',$budgetOrg);
        }
      }
      return $price;
    }


    public static function timeDuration($timeInSec='', $timeDuration=0)
    {
      $result = '';
      if($timeInSec!=''){
        $timeAdd   = strtotime('+ '.floatval($timeDuration).' Days', $timeInSec);
        $diff      = $timeAdd - time();
        if($diff<=0){
          return '<span class="end-contest">Contest End </span>';
        }
        $endTime   = new \DateTime(date('Y-m-d H:i:s', $timeAdd));
        $current   = new \DateTime();
        $interval  = $endTime->diff($current);
        $month     = $interval->format('%m');
        $monthData = ($month>0) ? $month.' Month':'';
        $result    = $monthData.'  '.$interval->format('%d Days  %h Hr %i Min %s Sec');
      }
      return $result;
    }


    public static function contestValidity($timeInSec='', $timeDuration=0)
    {
      $result = '0';
      if($timeInSec!=''){
        $timeAdd   = strtotime('+ '.floatval($timeDuration).' Days', $timeInSec);
        $result      = $timeAdd - time();
      }
      return $result;
    }

    /*count user_won with status='1' for a contest in proposal*/
    public static function wonStatus($contestId='0')
    {
      $query = new Query;
      return $query->select(['id'])->from('contest_proposal')->where(['contest_id'=>$contestId,'user_won'=>'1'])->count();
    }


    /*count user_won with status='1' for a contest in proposal*/
    public static function myWonCount()
    {
      $query = new Query;
      return $query->select(['id'])->from('contest_proposal')->where(['user_won'=>'1', 'user_id' => \Yii::$app->user->getId()])->count();
    }


    /*Get list of won propopal list for current active user.*/
    public static function getMyWonContest()
    {
      $query = new Query;
      return  $query->select(['con.*', 'cp.user_won',  'cp.design_files', 'cp.created_at as cp_created_at', '(con.created_at+(con.contest_duration*86400)) as enddate'])
        ->from('contest as con')
        ->leftJoin('contest_proposal as cp', 'cp.contest_id=con.id')
        ->where(['cp.user_id'=>\Yii::$app->user->getId(), 'cp.user_won'=>'1'])
        ->limit(5)
        ->all();
    }


    /*
    Get all transactions list for super admin */
    public static function getTransaction()
    {
         $query = new Query;
         return $query->select([ 'c.*', 'u.username', 'u.email','t.transaction_id',  't.transaction_amount',
            't.payment_date as tn_payment_date'])
            ->from('contest as c')
            ->LeftJoin('transaction_details as t', 't.contest_id=c.id')
            ->LeftJoin('user as u', 'u.id=c.user_id')
            ->orderBy(['t.payment_date' => SORT_DESC]);      
    }
  
}
