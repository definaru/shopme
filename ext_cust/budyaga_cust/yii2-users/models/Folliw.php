<?php

namespace budyaga_cust\users\models;

use Yii;

/**
 * This is the model class for table "1038_folliw".
 *
 * @property string $id
 * @property string $icon
 * @property string $link
 * @property string $target
 */
class Folliw extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '1038_folliw';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['icon', 'link'], 'required'],
            [['title', 'icon', 'link', 'target'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'title' => 'Комментарий',
            'icon' => Yii::t('yii', 'Icon'),
            'link' => Yii::t('yii', 'LINK'),
            'target' => Yii::t('yii', 'Target'),
        ];
    }
}
