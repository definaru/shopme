<?php
    namespace budyaga_cust\users\models;

    use Yii;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    use budyaga_cust\users\models\City;


class CitySearch extends City {

    public function rules() {
        return [
            [['c_id'], 'integer'],
            [['c_header', 'c_obl'], 'safe'],
        ];
    }

    public function scenarios() {
        return Model::scenarios();
    }

    public function search($params) {
        $query = City::find()->orderBy(['c_header' => SORT_ASC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 5],
        ]);
        
        

        $this->load($params);

        if (!$this->validate()) {return $dataProvider;}

        $query->andFilterWhere([
            'c_id' => $this->c_id,
        ]);

        $query->andFilterWhere(['like', 'c_header', $this->c_header])
            ->andFilterWhere(['like', 'c_obl', $this->c_obl]);

        return $dataProvider;
    }
}
