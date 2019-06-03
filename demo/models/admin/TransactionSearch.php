<?php

namespace app\models\admin;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransactionDetails;

/**
 * CompetitionSearch represents the model behind the search form of `app\models\Competition`.
 */
class TransactionSearch extends TransactionDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'contest_id','order_id','transaction_amount'],'integer'],
            [['transaction_id'],'string'],
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

        $query = TransactionDetails::find();
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>['PageSize'=>10],
            'sort' => ['defaultOrder'=> ['payment_date'=>SORT_DESC]],
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
            'transaction_amount'=>$this->transaction_amount,
            'payment_status'=>$this->payment_status,
        ]);


        if ($this->payment_date!== null && $this->payment_date!='') {
            $date = strtotime($this->payment_date);
            $query->andFilterWhere(['between', 'payment_date', $date, $date + 3600 * 24]);
        }

        $query->andFilterWhere(['like', 'transaction_id', $this->transaction_id])
            ->andFilterWhere(['like', 'order_id', $this->order_id]);
            //->andFilterWhere(['like', 'name', $this->name]);
        return $dataProvider;
    }
}
