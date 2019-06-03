<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "competition".
 *
 * @property int $id
 * @property string $user_id
 * @property string $title
 * @property string $body
 * @property int $created_at
 * @property int $updated_at
 * @property double $budget_from
 * @property double $budget_to
 */
class Contest extends \yii\db\ActiveRecord
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
              'promote_contest',
              'guaranteed_contest_option',
              'contest_duration',
              'name',
              'email',
              'phone',
              'hear_about_arkotte',
            ], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
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
          'about_family'=>'about_family',
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
        ];
    }



    public function save()
    {
       $this->save();
    }

}
