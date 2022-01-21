<?php

namespace budyaga_cust\users\models;

use Yii;

/**
 * This is the model class for table "1038_iconsforsite".
 *
 * @property string $id
 * @property string $icons
 */
class Iconsforsite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '1038_iconsforsite';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['icons'], 'required'],
            [['icons'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'icons' => 'Icons',
        ];
    }
}
