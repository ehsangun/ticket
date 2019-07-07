<?php

namespace common\models;

use common\models\Ticket;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TicketSearch represents the model behind the search form of `common\models\Ticket`.
 */
class TicketSearch extends Ticket
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'IdCustomer', 'IdAdmin'], 'integer'],
            [['subject', 'products', 'description', 'created_at'], 'safe'],
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
        $user = new User();
        $user=User::findIdentity(Yii::$app->user->getId());


        if($user->role=='customer') {
            $query = Ticket::find();
            $query->where('IdCustomer=' . Yii::$app->user->getId());
        }
        else if($user->role=='admin'){
            $query = Ticket::find();

        }



        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'IdCustomer' => $this->IdCustomer,
            'IdAdmin' => $this->IdAdmin,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'products', $this->products])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
