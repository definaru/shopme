<?php

namespace budyaga_cust\users\models;

use Yii;

// return (!file_exists($param)) ? mkdir($param, 0777, true) : '';
class Project extends \yii\db\ActiveRecord 
{

    public static function tableName()
    {
        return '1038_project';
    }

    public function rules()
    {
        return [        
            [['description'], 'string'],
            [['number_deal', 'name', 'image', 'owner', 'type', 'lang'], 'required']
        ];
    }

    public function createFolder($param) 
    {
        return (!file_exists($param)) ? mkdir($param, 0777, true) : '';
    }

    public function attributeLabels()
    {
        return [
            // 'id' => 'ID',
            'number_deal' => 'Номер сделки', 
            'name' => 'Название проекта', 
            'image' => 'Картинка', 
            'owner' => 'Владелец', 
            'description' => 'Описание проекта', 
            'type' => 'Тип проекта',
            'lang' => 'язык'
        ];
    }

}