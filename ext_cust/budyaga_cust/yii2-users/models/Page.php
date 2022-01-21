<?php

namespace budyaga_cust\users\models;
use Yii;

class Page extends \yii\db\ActiveRecord
{
    
    
    public static function tableName()
    {
        return 'page';
    }

    public function rules()
    {
        return [
            [['header', 'land'], 'required'],
            [['title', 'keywords', 'description', 'keywords', 'description', 'text', 'fulltext', 'href'], 'string'],
            [['title', 'header', 'slider'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'title' => 'Заголовок',
            'keywords' => 'Ключевые слова',
            'description' => 'Описание',
            'header' => 'Заголовок страницы',
            'text' => 'Текст страницы',
            'fulltext' => 'Полный текст',
            'slider' => 'Картинка слайдера',
            'land' => 'Язык сайта',
            'href' => 'Гиперссылка',
        ];
    }
    
//    public function upload()
//    {
//        if ($this->validate()) {
//            $this->slider->saveAs('img/' . $this->slider->baseName . '.' . $this->slider->extension);
//            return true;
//        } else {
//            return false;
//        }
//    }     
    
    
    
}
