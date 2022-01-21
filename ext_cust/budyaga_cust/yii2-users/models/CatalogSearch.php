<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use budyaga_cust\users\models\Catalog;


class CatalogSearch extends Catalog
{

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [
                [
                    'title', 
                    'keywords', 
                    'description', 
                    'filter', 
                    'img', 
                    'fullimg',
                    'name', 
                    'header', 
                    'head', 
                    'manufacture', 
                    'shelf_life', 
                    'doza', 
                    'type', 
                    'time', 
                    'reception', 
                    'alhogole', 
                    'en_text', 
                    'text', 
                    'en_descs', 
                    'descs', 
                    'sort',  
                    'pdf', 
                    'nalog', 
                    'tsj', 
                    'mon_profitability', 
                    'price', 
                    'pdf', 
                    'baths',
                    'beds',
                    'map', 
                    'link'
                ], 
            'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Catalog::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
                'pagination' => [
                    'pageSize' => 5,
                ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['id' => $this->id]);

        $query->andFilterWhere(['like', 'title', $this->title])
              ->andFilterWhere(['like', 'keywords', $this->keywords])
              ->andFilterWhere(['like', 'description', $this->description])
              ->andFilterWhere(['like', 'filter', $this->filter])
              ->andFilterWhere(['like', 'img', $this->img])
              ->andFilterWhere(['like', 'fullimg', $this->fullimg])
              ->andFilterWhere(['like', 'name', $this->name])
              ->andFilterWhere(['like', 'header', $this->header])
              ->andFilterWhere(['like', 'text', $this->text])
              ->andFilterWhere(['like', 'en_text', $this->en_text])
              ->andFilterWhere(['like', 'head', $this->header])
              ->andFilterWhere(['like', 'manufacture', $this->manufacture])
              ->andFilterWhere(['like', 'shelf_life', $this->shelf_life])
              ->andFilterWhere(['like', 'doza', $this->doza])
              ->andFilterWhere(['like', 'type', $this->type])
              ->andFilterWhere(['like', 'time', $this->time])
              ->andFilterWhere(['like', 'reception', $this->reception])
              ->andFilterWhere(['like', 'alhogole', $this->alhogole])
              ->andFilterWhere(['like', 'en_descs', $this->en_descs])
              ->andFilterWhere(['like', 'descs', $this->descs])
              ->andFilterWhere(['like', 'sort', $this->sort])
              ->andFilterWhere(['like', 'pdf', $this->pdf])
              ->andFilterWhere(['like', 'nalog', $this->nalog])
              ->andFilterWhere(['like', 'tsj', $this->tsj])
              ->andFilterWhere(['like', 'mon_profitability', $this->mon_profitability])
              ->andFilterWhere(['like', 'price', $this->price])
              ->andFilterWhere(['like', 'pdf', $this->pdf])
              ->andFilterWhere(['like', 'baths', $this->baths])
              ->andFilterWhere(['like', 'beds', $this->beds])
              ->andFilterWhere(['like', 'map', $this->map])
              ->andFilterWhere(['like', 'link', $this->link]);
        
        return $dataProvider;
    }
}
