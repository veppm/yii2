<?php

namespace app\models\admin;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ContestForm;
use app\models\ContestProposal;

/**
 * CompetitionSearch represents the model behind the search form of `app\models\Competition`.
 */
class ProposalSearch extends ContestProposal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'],'string'],
            [['user_won','created_at'], 'safe']
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
       // $query = ContestProposal::getProposalList();
       $query = ContestProposal::getProposalList(\Yii::$app->request->get('contest-proposal'));
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>['PageSize'=>10],
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
            'cp.user_won'=>$this->user_won
        ]);

        if ($this->created_at!== null && $this->created_at!='') {
            $date = strtotime($this->created_at);
            $query->andFilterWhere(['between', 'cp.created_at', $date, $date + 3600 * 24]);
        }

        $query->andFilterWhere(['like', 'u.username', $this->user_id]);
        return $dataProvider;
    }
}
