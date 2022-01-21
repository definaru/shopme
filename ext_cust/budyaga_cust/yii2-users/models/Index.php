<?php

namespace budyaga_cust\users\models;

use Yii;

class Index extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '1038_indexpage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'charset', 'lang', 'company'], 'required'],
            [['apple_touth', 'keywords', 'description', 'meta', 'map', 
                'google_analitiks', 'yandex_direct', 'map', 'block'], 'string'],
            [['title', 'apple_touth', 'charset', 'lang', 'favicon', 'robots', 'logo', 'company', 'slogan', 
                'phone', 'phone2', 'adress', 'adress2', 'email', 'email2', 'inn', 'kpp', 'ogrn'], 'string', 'max' => 255],
        ];
    }
    
               
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            // 'id' => 'ID',
            'title' => 'Заголовок',
            'apple_touth' => 'Apple Touch Icon',
            'charset' => 'Кодировка',
            'lang' => 'Язык сайта',
            'favicon' => 'Иконка сайта',
            'robots' => 'Индексация',
            'keywords' => 'Ключевые слова',
            'description' => 'Описание',
            'logo' => 'Логотип',
            'company' => 'Название компании',
            'slogan' => 'Слоган',
            'phone' => 'Телефон компании',
            'phone2' => 'Телефон техподдержки',
            'adress' => 'Адрес фактический',
            'adress2' => 'Адрес юридический',
            'email' => 'E-mail',
            'email2' => 'E-mail',
            'inn' => 'ИНН',
            'kpp' => 'КПП',
            'ogrn' => 'ОГРН',
            'meta' => 'Мета теги',
            'map' => 'Карта',
            'google_analitiks' => 'Google Analitiks',
            'yandex_direct' => 'Yandex Direct',
            'block' => 'Защитить контент?',
        ];
    }
}