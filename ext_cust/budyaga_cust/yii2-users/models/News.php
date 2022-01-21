<?php

namespace budyaga_cust\users\models;

use Yii;

class News extends \yii\db\ActiveRecord {

    public static function tableName() {
        return '1038_new';
    }
    
    public function rules()
    {
        return [
            [['title', 'intro_text', 'link', 'time'], 'required'],
            ['link', 'unique', 'message' => 'запись с такой же ссылкой уже существует, напишите другую!'],
            ['link', 'match', 'pattern' => '/^[a-z0-9_-]{3,16}$/', 'message' => Yii::t('users', 'LINK')],
            [['new_post', 'full_text', 'video'], 'string'],
            [['img', 'img_mini', 'images'], 'string', 'max' => 255],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'new_post' => 'Новинка?',
            'images' => 'Картинка',
            'img' => 'Глиф',
            'img_mini' => 'Автор',
            'title' => 'Название',
            'link' => 'Ссылка',
            'intro_text' => 'Описание',
            'full_text' => 'Полный текст',
            'video' => 'Видео',
            'time' => 'Дата публикации',      
        ];
    }    
    
    
}