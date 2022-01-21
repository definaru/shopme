<?php
    namespace budyaga_cust\users\models;
    use Yii;

class Menu extends \yii\db\ActiveRecord {

    public static function tableName() {
        return '1038_munu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'sort', 'href'], 'required'],
            [['sort', 'level', 'layer'], 'integer'],
            [['name', 'href'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'sort' => 'Сортировка',
            'href' => 'Ссылка',
            'level' => 'Уровень',
            'layer' => 'Слой',
        ];
    }
}
