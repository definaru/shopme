<?php

namespace budyaga_cust\users\models;

use Yii;

/**
 * This is the model class for table "1039_service".
 *
 * @property string $id
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $background
 * @property string $icon
 * @property string $header
 * @property string $text
 * @property string $fulltexts
 * @property string $land
 * @property string $link
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '1039_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'keywords', 'description', 'background', 'header', 'text', 'fulltexts', 'land', 'link'], 'required'],
            [['description', 'text', 'fulltexts', 'icon'], 'string'],
            [['title', 'background', 'header'], 'string', 'max' => 255],
            [['keywords'], 'string', 'max' => 200],
            [['land'], 'string', 'max' => 100],
            ['link', 'unique', 'message' => 'запись с такой же ссылкой уже существует, напишите другую!'],
            ['link', 'match', 'pattern' => '/^[a-z0-9_-]{5,36}$/', 'message' => Yii::t('users', 'LINK')],
        ];
    }
    

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'title' => Yii::t('yii', 'Title'),
            'keywords' => Yii::t('yii', 'Keywords'),
            'description' => Yii::t('yii', 'Description'),
            'background' => Yii::t('yii', 'Background'),
            'icon' => Yii::t('yii', 'Icons'),
            'header' => Yii::t('yii', 'Header'),
            'text' => Yii::t('yii', 'Text'),
            'fulltexts' => Yii::t('yii', 'Fulltexts'),
            'land' => Yii::t('yii', 'Land'),
            'link' => Yii::t('yii', 'Link'),
        ];
    }
}
