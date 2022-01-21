<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use budyaga_cust\users\models\Menu;

class MenuSearch extends Menu
{

    public function rules()
    {
        return [
            [['id', 'name'], 'integer'],
            [['sort', 'href', 'level', 'layer'], 'safe'],
        ];
    }


    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Menu::find();

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
            'name' => $this->name,
        ]);

        $query->andFilterWhere(['like', 'sort', $this->sort])
              ->andFilterWhere(['like', 'href', $this->href])
              ->andFilterWhere(['like', 'level', $this->level])
              ->andFilterWhere(['like', 'layer', $this->layer]);       
        return $dataProvider;
    }
}
