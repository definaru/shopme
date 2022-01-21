<?php

namespace budyaga_cust\users\models;

use Yii;

class Slider extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '1038_slide_show';
    }


    public function rules()
    {
        return [
            [['show_time', 'show_header', 'show_text', 'show_time', 'lang'], 'required'],
            ['link', 'required', 'message' => 'Внимание! Укажите ссылку на статью!'],
            [['show_photo', 'show_icon', 'show_text', 'show_texter', 'show_texter', 'show_news'], 'string'],
            //['link', 'unique', 'message' => 'запись с такой же ссылкой уже существует, напишите другую!'],
            //['link', 'match', 'pattern' => '/^[a-z0-9_-]{3,16}$/', 'message' => Yii::t('users', 'LINK')],
            [['title', 'keywords', 'description', 'show_photo', 'show_icon', 'show_header'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            //'id' => 'Show ID',
            'title' => 'Title', 
            'keywords' => 'Keywords', 
            'description' => 'Description',
            'show_photo' => 'Картинка',
            'show_icon' => 'Автор',
            'show_time' => 'Время добавления',
            'show_header' => 'Заголовок',
            'show_text' => 'Текст',
            'show_texter' => 'Описание',
            'show_news' => 'Раздел',
            'years' => 'Год публикации',
            'lang' => 'Язык страницы',
            'link' => Yii::t('yii', 'LINK'),
        ];
    }
}
