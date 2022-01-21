<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use budyaga_cust\users\models\Zakaz;


class ZakazSearch extends Zakaz
{

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['fio', 'header', 'tz', 'price', 'pay', 'place', 'service', 'analitics', 'phone', 'email', 'date',], 'safe'],
        ];
    }


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
        $query = Zakaz::find();

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
        ]);

        $query->andFilterWhere(['like', 'fio', $this->fio])
                ->andFilterWhere(['like', 'header', $this->header])
                ->andFilterWhere(['like', 'tz', $this->tz])
                ->andFilterWhere(['like', 'price', $this->price])
                ->andFilterWhere(['like', 'pay', $this->pay])
                ->andFilterWhere(['like', 'place', $this->place])
                ->andFilterWhere(['like', 'service', $this->service])
                ->andFilterWhere(['like', 'analitics', $this->analitics])
                ->andFilterWhere(['like', 'phone', $this->phone])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'date', $this->date]);

        return $dataProvider;
    }
}
