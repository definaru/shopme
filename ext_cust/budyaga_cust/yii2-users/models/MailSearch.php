<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use budyaga_cust\users\models\Mail;



class MailSearch extends Mail
{ 

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['city', 'img', 'name', 'phone', 'email', 'slug', 'body', 'file', 'ip', 'date', 'pub'], 'safe'],
        ];
    }


    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    public function search($params)
    {
        $query = Mail::find()->orderBy(['id' => SORT_DESC]);
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

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'city', $this->city])
              ->andFilterWhere(['like', 'img', $this->img])
              ->andFilterWhere(['like', 'name', $this->name])
              ->andFilterWhere(['like', 'phone', $this->phone])
              ->andFilterWhere(['like', 'email', $this->email])
              ->andFilterWhere(['like', 'slug', $this->slug])
              ->andFilterWhere(['like', 'body', $this->body])
              ->andFilterWhere(['like', 'file', $this->file])
              ->andFilterWhere(['like', 'ip', $this->ip])
              ->andFilterWhere(['like', 'date', $this->date])
              ->andFilterWhere(['like', 'pub', $this->pub]);

        return $dataProvider;
    }
}
