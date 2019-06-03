<?php

namespace app\models\admin;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\admin\ContactForm;

/**
 * CompetitionSearch represents the model behind the search form of `app\models\Competition`.
 */
class EnquiriesSearch extends ContactForm
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'message','created_at'], 'string']
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

        $query = ContactForm::find();
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 10),
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
            'email'=>$this->email,
        ]);

        if ($this->created_at!== null && $this->created_at!='') {
            $date = strtotime($this->created_at);
            $query->andFilterWhere(['between', 'created_at', $date, $date + 3600 * 24]);
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'message', $this->message]);
        return $dataProvider;
    }
}
