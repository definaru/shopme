<?php
namespace budyaga_cust\users\models;

use yii\base\Model;
use yii\web\UploadedFile;
use budyaga_cust\users\models\Page;

class UploadForm extends Model
{
    public $id;
    public $title;
    public $keywords;
    public $description;
    public $header;
    public $text;
    public $fulltext;   
    public $slider;
    
    private $dbModel;    
    
    public function rules()
    {
        return [
            [['slider'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif'],
            [['title', 'keywords', 'description', 'header'], 'required'],
            [['keywords', 'description', 'text', 'fulltext'], 'string'],
            [['title', 'header', 'slider'], 'string', 'max' => 255],            
        ];
    }
    
    public function saveModel()
    {
//        $attachment = new Page();
//
//        $attachment->saveWithFile($this->slider);
//
//
//        $this->dbModel->title = $this->title;
//        $this->dbModel->keywords = $this->keywords;
//        $this->dbModel->description = $this->description;
//        $this->dbModel->header = $this->header;
//        $this->dbModel->text = $this->text;
//        $this->dbModel->fulltext = $this->fulltext;
        return $this->dbModel->save();
    }

    public function loadModel($model)
    {
        $this->dbModel = $model;
        $this->title = $model->title;
        $this->keywords = $model->keywords;
        $this->description = $model->description;
        $this->header = $model->header;
        $this->text = $model->text;
        $this->fulltext = $model->fulltext;        
    }

    public function getModel()
    {
        return $this->dbModel;
    }
}

