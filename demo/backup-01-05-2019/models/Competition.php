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
class Competition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'title','budget_from', 'budget_to','body'], 'required'],
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['body'], 'string'],
            [['budget_from', 'budget_to'], 'number'],
            [['title'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'body' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'budget_from' => 'Budget From',
            'budget_to' => 'Budget To',
        ];
    }
}
