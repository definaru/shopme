<?php

namespace budyaga_cust\users\models\forms;

use yii\base\Model;
//use yii\web\UploadedFile;
//use budyaga_cust\users\models\forms\UploadFile;
use budyaga_cust\users\models\Defina;

class UploadForm extends Model
{

    
    public $skanpassfront;
    public $skanpassback;
    public $innname;
    
    

    public function rules()
    {
        return [
            [['innname'], 'required'],
            [['skanpassfront'], 'file', 'skipOnEmpty' => false, 'extensions' => Defina::extensions, 'maxSize' => 10*1024*1024],
            [['skanpassback'], 'file', 'skipOnEmpty' => true, 'extensions' => Defina::extensions, 'maxSize' => 10*1024*1024],
            ['skanpassback', 'default', 'value' => '1'],
        ];
    }
    
//    public function upload()
//    {
//        if ($this->validate()) {
//            UploadFile::createFolder(Yii::$app->user->identity->nik);
//            // $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
//            return true;
//        } else {
//            return false;
//        }
//    }
}