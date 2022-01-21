<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use budyaga_cust\users\models\Iconsforsite;

/**
 * IconsforsiteSearch represents the model behind the search form about `app\models\Iconsforsite`.
 */
class IconsforsiteSearch extends Iconsforsite
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['icons'], 'safe'],
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
        $query = Iconsforsite::find();

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

        $query->andFilterWhere(['like', 'icons', $this->icons]);

        return $dataProvider;
    }
}
