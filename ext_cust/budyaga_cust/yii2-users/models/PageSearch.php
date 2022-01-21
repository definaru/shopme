<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use budyaga_cust\users\models\Page;


class PageSearch extends Page
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'keywords', 'description', 'header', 'text', 'fulltext', 'slider', 'land'], 'safe'],
        ];
    }


    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    public function search($params)
    {
        $query = Page::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 5],
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

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'header', $this->header])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'fulltext', $this->fulltext])
            ->andFilterWhere(['like', 'land', $this->land])
            ->andFilterWhere(['like', 'slider', $this->slider]);

        return $dataProvider;
    }
}
