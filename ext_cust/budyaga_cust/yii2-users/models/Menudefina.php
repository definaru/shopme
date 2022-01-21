<?php

namespace budyaga_cust\users\models;
use Yii;

/**
 * This is the model class for table "1038_menudefina".
 *
 * @property string $id
 * @property string $href
 * @property string $icon
 * @property string $name
 * @property integer $access
 */
class Menudefina extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '1038_menudefina';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['href', 'icon', 'name'], 'required'],
            [['access'], 'integer'],
            [['href', 'icon', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'href' => 'Ссылка',
            'icon' => 'Иконка',
            'name' => 'Название',
            'access' => 'Доступ',
        ];
    }
}
