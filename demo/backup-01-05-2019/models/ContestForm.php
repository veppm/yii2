<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Contest;
use yii\db\ActiveRecord;

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

    /*
    public $inspiration; 
    public $building_site;
    public $materials_finishes; 
    public $about_situation;
    public $about_family;
    public $family_specific_need;
    public $beds_no;
    public $bathrooms_no;
    public $living_spaces;
    public $additional_room;
    public $communicate_architects;
    public $approximate_budjet;
    public $looking_build;
    public $land_other_size;
    public $sketches;
    public $contest_title;
    public $promote_contest;
    public $guaranteed_contest_option;
    public $contest_duration;
    public $name;
    public $email;
    public $phone;
    public $hear_about_arkotte;
    public $user_id;
    public $status;
    public $created_at;
    public $updated_at;
    */

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
              'promote_contest',
              'guaranteed_contest_option',
              'contest_duration',
              'name',
              'email',
              'phone',
              'hear_about_arkotte',
            ], 'required'],

            [['sketches'], 'file', 'skipOnEmpty' => false],
            // email has to be a valid email address
            [['email'], 'email'],
            
        ];
    }

    /**
     * @return array customized attribute labels
    */

    public function attributeLabels() {
        return [
          'inspiration'=>'inspiration', 
          'building_site'=>'building_site', 
          'materials_finishes'=>'materials_finishes', 
          'about_situation'=>'about_situation',
          'about_situation_other'=>'about_situation_other',
          'about_family'=>'about_family',
          'about_family_other'=>'about_family_other',
          'family_specific_need'=>'family_specific_need',
          'beds_no'=>'beds_no',
          'bathrooms_no'=>'bathrooms_no',
          'living_spaces'=>'living_spaces',
          'additional_room'=>'additional_room',
          'communicate_architects'=>'communicate_architects',
          'approximate_budjet'=>'approximate_budjet',
          'looking_build'=>'looking_build',
          'land_other_size'=>'land_other_size',
          'sketches'=>'sketches',
          'contest_title'=>'contest_title',
          'promote_contest'=>'promote_contest',
          'guaranteed_contest_option'=>'guaranteed_contest_option',
          'contest_duration'=>'contest_duration',
          'name'=>'name',
          'email'=>'email',
          'phone'=>'phone',
          'hear_about_arkotte'=>'hear_about_arkotte',
          'status'=>'status',
          'payment_status' =>'Payment',
          'payment_date'=> 'Payment date',
        ];
    }

    /*public function insertData($value='')
    {
        if ($this->validate()) {
            $user = \Yii::createObject(Contest::className());
            $user->role = '3';
            // $user->setScenario('register');              
            $this->loadAttributes($user);

            echo "<pre>";
            print_r($user);
            exit;

            return $user->save();
        }
       return false;
    }*/


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


    public static function timeDuration($timeins='')
    {
      $result = '';
      if($timeins!=''){
        $prev      = new \DateTime(date('Y-m-d H:i:s', $timeins));
        $current   = new \DateTime();
        $interval  = $current->diff($prev);
        $month     = $interval->format('%m');
        $monthData = ($month>0) ? $month.' Month':'';
        $result = $monthData.'  '.$interval->format('%d Days  %h Hr %i Min %s Sec');
      }
      return $result;
    }


    

    
}
