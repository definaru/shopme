<?php

namespace budyaga_cust\users\models;

use Yii;


class Docs extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '1038_documentation';
    }

    public function rules()
    {
        return [
            [['header', 'land'], 'required'],
            
            [['text'], 'string'],
            [['img', 'href'], 'string', 'max' => 255]
        ];
    }


    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'img' => 'Картинка',
            'header' => 'Заголовок',
            'text' => 'Текст',
            'land' => 'Язык сайта',
            'href' => 'Ссылка',
        ];
    }
}
