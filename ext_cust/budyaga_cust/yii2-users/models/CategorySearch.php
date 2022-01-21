<?php
    namespace budyaga_cust\users\models;

    use Yii;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    use budyaga_cust\users\models\Category;


class CategorySearch extends Category
{

    public function rules()
    {
        return [
            [['id', 'time'], 'integer'],
            [['title', 'img', 'header', 'text', 'link'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Category::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
                'pagination' => [
                    'pageSize' => 5,
                ],            
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'header', $this->header])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }
}
