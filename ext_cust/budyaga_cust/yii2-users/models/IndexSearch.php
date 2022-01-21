<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use budyaga_cust\users\models\Index;

/**
 * IndexSearch represents the model behind the search form about `app\models\Index`.
 */
class IndexSearch extends Index
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [
                [
                'title', 'apple_touth', 'charset', 'lang', 'favicon', 'robots', 
                'keywords', 'description', 'logo', 'company', 'slogan', 'phone', 
                'phone2', 'adress', 'adress2', 'email', 'email2', 'meta', 'map', 'google_analitiks', 
                'yandex_direct', 'block'
                ], 
            'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Index::find();

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

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'apple_touth', $this->apple_touth])
            ->andFilterWhere(['like', 'charset', $this->charset])
            ->andFilterWhere(['like', 'lang', $this->lang])
            ->andFilterWhere(['like', 'favicon', $this->favicon])
            ->andFilterWhere(['like', 'robots', $this->robots])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'slogan', $this->slogan])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'phone2', $this->phone2])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'adress2', $this->adress2])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'email2', $this->email2])            
            ->andFilterWhere(['like', 'inn', $this->email])
            ->andFilterWhere(['like', 'kpp', $this->email])
            ->andFilterWhere(['like', 'ogrn', $this->email])
            ->andFilterWhere(['like', 'meta', $this->meta])
            ->andFilterWhere(['like', 'map', $this->map])
            ->andFilterWhere(['like', 'google_analitiks', $this->google_analitiks])
            ->andFilterWhere(['like', 'yandex_direct', $this->yandex_direct])
            ->andFilterWhere(['like', 'block', $this->block]);

        return $dataProvider;
    }
}
