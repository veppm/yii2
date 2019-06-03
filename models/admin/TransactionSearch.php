<?php

namespace app\models\admin;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ContestForm;
use app\models\TransactionDetails;

/**
 * CompetitionSearch represents the model behind the search form of `app\models\Competition`.
 */
class TransactionSearch extends ContestForm
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'order_id','contest_title'],'string'],
            [['payment_status','payment_date'], 'safe'],
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
        $query = ContestForm::getTransaction();
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>['PageSize'=>10],
        ]);


        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            //$query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'c.design_package'=>$this->design_package,
            'c.payment_status'=>$this->payment_status,
        ]);

        if ($this->payment_date!== null && $this->payment_date!='') {
            $date = strtotime($this->payment_date);
            $query->andFilterWhere(['between', 'c.payment_date', $date, $date + 3600 * 24]);
        }

        $query->andFilterWhere(['like', 'c.order_id', $this->order_id])
            ->andFilterWhere(['like', 'c.contest_title', $this->contest_title])
            ->andFilterWhere(['like', 'u.username', $this->user_id]);
        return $dataProvider;
    }
}
