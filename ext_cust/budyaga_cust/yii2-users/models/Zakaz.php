<?php

namespace budyaga_cust\users\models;

use Yii;

class Zakaz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '1039_zakaz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['fio', 'header', 'tz' ,'price', 'pay', 'place', 'service', 'analitics', 'phone', 'email', 'date',], 'required'],
            [['fio'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Ф.И.О.',
            'header' => 'Название услуги',
            'tz' => 'Техническое Задание',
            'price' => 'Цена услуги',
            'pay' => 'Внесённая сумма',
            'place' => 'Гео данные клиента',
            'service' => 'Список оказанных услуг',
            'analitics' => 'Аналитика',
            'phone' => 'Телефон мобильный', 
            'email' => 'Email',
            'date' => 'Дата создания',
        ];
    }
}
