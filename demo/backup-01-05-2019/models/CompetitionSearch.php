<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Competition;

/**
 * CompetitionSearch represents the model behind the search form of `app\models\Competition`.
 */
class CompetitionSearch extends Competition
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['title', 'body'], 'safe'],
            [['budget_from', 'budget_to'], 'number'],
        ];
    }
    

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($userId, $params)
    {

        $query = Competition::find();
        if($userId!=='admin') {
            $query =  $query->where(['user_id'=>$userId]);
        } else {
            // $query =  $query->joinWith('user');
        }
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'budget_from' => $this->budget_from,
            'budget_to' => $this->budget_to,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body]);
        return $dataProvider;
    }
}
