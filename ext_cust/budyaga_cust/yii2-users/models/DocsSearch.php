<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use budyaga_cust\users\models\Docs;


class DocsSearch extends Docs
{

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['img', 'img', 'header', 'text', 'land', 'href'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Docs::find();
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

        $query->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'header', $this->header])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'land', $this->land])
            ->andFilterWhere(['like', 'href', $this->href]);

        return $dataProvider;
    }
}
