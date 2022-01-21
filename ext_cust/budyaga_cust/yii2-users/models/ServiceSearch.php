<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use budyaga_cust\users\models\Service;

/**
 * ServiceSearch represents the model behind the search form of `budyaga_cust\users\models\Service`.
 */
class ServiceSearch extends Service
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'keywords', 'description', 'background', 'icon', 'header', 'text', 'fulltexts', 'land', 'link'], 'safe'],
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
        $query = Service::find();

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
            ->andFilterWhere(['like', 'background', $this->background])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'header', $this->header])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'fulltexts', $this->fulltexts])
            ->andFilterWhere(['like', 'land', $this->land])
            ->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }
}
