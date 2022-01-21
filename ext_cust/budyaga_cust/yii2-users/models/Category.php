<?php

    namespace budyaga_cust\users\models;
    
    
    use Yii;
    

class Category extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '1038_category';
    }

    public function rules()
    {
        return [
            ['header', 'required', 'message' => 'Напишите название категории!'],
            ['link', 'required', 'message' => 'гиперссылка на категорию обязательна!'],
            ['text', 'required', 'message' => 'Обязательно напишите описание категории'],
            ['link', 'unique', 'message' => 'запись с такой же ссылкой уже существует, напишите другую!'],
            ['link', 'match', 'pattern' => '/^[a-z0-9_-]{3,16}$/', 'message' => Yii::t('users', 'LINK')],            
            [['text'], 'string'],
            [['time'], 'integer'],
            [['title', 'img', 'header'], 'string', 'max' => 255],
        ];
    }
    
    public function getNameType($param = '') 
    {
        $model = self::findOne(['header' => $param]);
        return (Yii::$app->language == 'ru') ? $param : $model->title;
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'img' => 'Картинка',
            'header' => 'Заголовок',
            'text' => 'Текст',
            'link' => 'Гиперссылка',
            'time' => 'Дата создания',
        ];
    }
}
