<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use budyaga_cust\users\models\Slider;


class SliderSearch extends Slider
{

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [[
                'title', 'keywords', 'description',
                'show_photo', 'show_icon', 'show_time', 'show_header', 'show_text', 'show_texter', 'show_news', 'link', 'lang', 'years'], 'safe'],
        ];
    }


    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Slider::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 5],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

           
        $query  ->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'keywords', $this->keywords])
                ->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'show_photo', $this->show_photo])    
                ->andFilterWhere(['like', 'show_icon', $this->show_icon])
                ->andFilterWhere(['like', 'show_time', $this->show_time])
                ->andFilterWhere(['like', 'show_header', $this->show_header])
                ->andFilterWhere(['like', 'show_text', $this->show_text])
                ->andFilterWhere(['like', 'show_texter', $this->show_texter])
                ->andFilterWhere(['like', 'show_news', $this->show_news])
                ->andFilterWhere(['like', 'years', $this->years])
                ->andFilterWhere(['like', 'lang', $this->lang])
                ->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }
}
