<?php

namespace common\models;

use common\models\Answer;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AnswerSearch represents the model behind the search form of `common\models\Answer`.
 */
class AnswerSearch extends Answer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'IdTicket'], 'integer'],
            [['message', 'owner', 'created_at'], 'safe'],
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
        $query = Answer::find()->where('IdTicket=' . Yii::$app->request->get('id'));



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
            'Id' => $this->Id,
            'IdTicket' => $this->IdTicket,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'owner', $this->owner]);

        return $dataProvider;
    }
    public function searchAdmin($params)
    {
        $query = Answer::find();


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
            'Id' => $this->Id,
            'IdTicket' => $this->IdTicket,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'owner', $this->owner]);

        return $dataProvider;
    }
}
