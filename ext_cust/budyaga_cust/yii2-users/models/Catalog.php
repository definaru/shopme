<?php

namespace budyaga_cust\users\models;

use Yii;
//use yii\helpers\Html;
//use budyaga_cust\users\models\Category;
//use budyaga_cust\users\models\Scripts;
//use yii\web\UploadedFile;
use budyaga_cust\users\models\forms\UploadFile;

class Catalog extends \yii\db\ActiveRecord
{
    
    public $fullimg;

    public static function tableName()
    {
        return '1038_catalog';
    }

    
    public function getRecords($sort = 2, $limit = '') // $sort - 1 / 2
    {
        $model = self::find()->where(['filter' => 'vf'])AND(['filter' => 'close']);
        $select = ($sort == 1) ? SORT_ASC : SORT_DESC;
        $stop = ($limit == '') ? $model->orderBy(['id' => $select])->all() : $model->limit($limit)->orderBy(['id' => $select])->all();
        return ($limit == '' && $sort == '') ? $model->all() : $stop;
    }
    
    
    public function rules()
    {
        return [
            [['filter', 'text', 'en_text', 'head', 'descs', 'en_descs', 'link'], 'required'],
            [
                [
                    'alhogole', 'title', 'keywords', 'description', 'img', 
                    'fullimg', 'name', 'manufacture', 'shelf_life', 'doza', 
                    'type', 'time', 'reception', 'descs', 'sort', 'pdf', 
                    'nalog', 'tsj', 'mon_profitability', 'price', 'pdf', 
                    'map', 'link', 'header', 'baths', 'beds'
                ], 
                'string'
            ],
            // [['fullimg'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 1000],
            [['header'], 'string', 'max' => 255],
        ];
    }
    
    
    public function nameFile()
    {
        return date('dmY').'_verafund_';
    }
    
    
//    public function beforeSave($insert) 
//    {
//        if (parent::beforeSave($insert)) {
//            $response = Yii::$app->response;
//            $response->format = \yii\web\Response::FORMAT_JSON;
//            $response->data = $this->upload();
//            return true;
//        } else {
//            return false;
//       }
//    }
    
    
    public function upload()
    {
        $dir = 'gallery/' .$this->id. '/';
        UploadFile::createFolder($dir);
        if ($this->validate()) {
            $index = 1;
            foreach ($this->fullimg as $file) {
                $file->saveAs($dir . self::nameFile().preg_replace('/\s+/', '', $file->baseName) .$index++. '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
    
    public function attributeLabels()
    {
        return [
            // 'id' => 'ID',
            'title' => 'Тайтл',
            'keywords' => 'Ключевые слова',
            'description' => 'Дескрипшен',
            'filter' => 'Фильтр',
            'img' => 'Картинка',
            'fullimg' => 'Галерея',
            'name' => 'Название',
            'header' => 'Домен сайта (ссылка)',
            'text' => 'Краткое описание',
            'head' => 'Тип объекта',
            'manufacture' => 'Цена за квадратный метр',
            'shelf_life' => 'Мера квадратуры',
            'doza' => 'Первоначальная доходность',
            'type' => 'Категория',
            'time' => 'Мин. размер инвестиции',
            'reception' => 'Продолжительность инвестиций',
            'alhogole' => 'Уже инвестировано',
            'descs' => 'Описание',
            'sort' => 'Порядок сортировки',
            'pdf' => 'pdf',
            'nalog' => 'Налог на недвижимость',
            'tsj' => 'ТСЖ',
            'mon_profitability' => 'Ежемесячная доходность',
            'price' => 'Цена за сайт',
            'pdf' => 'PDF файл',
            'baths' => 'Ванные комнаты', 
            'beds' => 'Спальные комнаты',
            'map' => 'Карта',
            'link' => 'Ссылка',           
        ];
    }
}
