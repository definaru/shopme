<?php

namespace budyaga_cust\users\models;

use Yii;

/**
 * This is the model class for table "1038_city".
 *
 * @property string $c_id
 * @property string $c_header
 * @property string $c_obl
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '1038_city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_header', 'c_obl'], 'required'],
            [['c_header', 'c_obl'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'C ID',
            'c_header' => 'Город',
            'c_obl' => 'Область',
        ];
    }
}
