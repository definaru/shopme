<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\helpers\Html;


class Top extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '1038_top';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['icon', 'header', 'land'], 'required'],
            [['text'], 'string'],
            [['icon', 'header'], 'string', 'max' => 225]
        ];
    }
    
    
    protected function getRecords($sort = 2, $limit = '') // $sort - 1 / 2
    {
        $model = self::find()->where(['land' => Yii::$app->language]);
        $select = ($sort == 1) ? SORT_ASC : SORT_DESC;
        $stop = ($limit == '') ? $model->orderBy(['id' => $select])->all() : $model->limit($limit)->orderBy(['id' => $select])->all();
        return ($limit == '' && $sort == '') ? $model->all() : $stop;
    }
    
    public function viewTop() 
    {
        $items = [];
        foreach(self::getRecords(1,'') as $d) { // '.$d->icon.'
          echo '<div class="col-md-4 mt-4 text-left">
                    <div class="col-md-11 col-md-pull-1 text-justify">
                        '.Html::tag('h4', $d->header).'
                        '.Html::tag('p', $d->text, ['class' => 'style_feature_desc']).Scripts::Edit('top', $d->id).'                      
                    </div>
                </div>';
        }
        return $items;
    }
    

    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'icon' => 'Иконка',
            'header' => 'Заголовок',
            'text' => 'Описание',
            'land' => 'Язык сайта',
        ];
    }
}
