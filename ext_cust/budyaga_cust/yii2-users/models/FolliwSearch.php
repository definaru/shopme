<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use budyaga_cust\users\models\Folliw;



class FolliwSearch extends Folliw
{

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'icon', 'link', 'target'], 'safe'],
        ];
    }


    public function scenarios()
    {
        return Model::scenarios();
    }


    public function search($params)
    {
        $query = Folliw::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query ->andFilterWhere(['like', 'title', $this->title])
               ->andFilterWhere(['like', 'icon', $this->icon])
               ->andFilterWhere(['like', 'link', $this->link])
               ->andFilterWhere(['like', 'target', $this->target]);

        return $dataProvider;
    }
}
