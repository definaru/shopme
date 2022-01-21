<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use budyaga_cust\users\models\Faq;



class FaqSearch extends Faq
{

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['header', 'text', 'icon', 'lands'], 'safe'],
        ];
    }


    public function scenarios()
    {
        return Model::scenarios();
    }


    public function search($params)
    {
        $query = Faq::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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

        $query->andFilterWhere(['like', 'header', $this->header])
                    ->andFilterWhere(['like', 'text', $this->text])
                    ->andFilterWhere(['like', 'lands', $this->lands])
                    ->andFilterWhere(['like', 'icon', $this->icon]);

        return $dataProvider;
    }
}
