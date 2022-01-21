<?php

namespace budyaga_cust\users\models;

use Yii;

/**
 * This is the model class for table "1038_faqs".
 *
 * @property string $id
 * @property string $header
 * @property string $text
 * @property string $icon
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '1038_faqs';
    }

    public function getRecords() 
    {
        return self::find()->select(['icon'])->distinct()->where(['lands' => Yii::$app->language])->all();
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['header', 'lands'], 'required'],
            ['header', 'required', 'message' => 'Вы не написали вопрос'],
            ['text', 'required', 'message' => 'Вы не написали ответ'],
            [['text', 'icon'], 'string'],
            [['header'], 'string', 'max' => 255],
            [['icon'], 'string', 'max' => 100],
        ];
    }

    
    
    public function getActiveTab($param = '') 
    {
        return ($param == 'ru') ? 1 : 17;
    }
    
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'header' => 'Вопросы', //Yii::t('app', 'Header'),
            'text' => Yii::t('app', 'Text'),
            'lands' => 'Язык сайта',
            'icon' => Yii::t('app', 'Icon'),
        ];
    }
}
