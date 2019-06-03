<?php

namespace app\models\admin;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ContestForm;

/**
 * CompetitionSearch represents the model behind the search form of `app\models\Competition`.
 */
class ContestSearch extends ContestForm
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id','order_id','contest_duration'],'integer'],
            [['design_package','name'],'string'],
            [['contest_title', 'approximate_budjet','payment_status','payment_date','created_at'], 'safe'],
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
    public function search($params)
    {

        $query = ContestForm::find();
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>['PageSize'=>10],
            'sort' => ['defaultOrder'=> ['created_at'=>SORT_DESC]],
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
            'contest_duration'=>$this->contest_duration,
            'payment_status'=>$this->payment_status,
            'design_package'=>$this->design_package,
        ]);

        if ($this->created_at!== null && $this->created_at!='') {
            $date = strtotime($this->created_at);
            $query->andFilterWhere(['between', 'created_at', $date, $date + 3600 * 24]);
        }

        if ($this->payment_date!== null && $this->payment_date!='') {
            $payment_date = strtotime($this->payment_date);
            $query->andFilterWhere(['between', 'payment_date', $payment_date, $payment_date + 3600 * 24]);
        }

        $query->andFilterWhere(['like', 'contest_title', $this->contest_title])
            ->andFilterWhere(['like', 'order_id', $this->order_id])
            ->andFilterWhere(['like', 'name', $this->name]);
        return $dataProvider;
    }
}
