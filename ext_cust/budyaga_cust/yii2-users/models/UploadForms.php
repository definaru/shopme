<?php
 
namespace budyaga_cust\users\models;
 
use Yii;
use yii\base\Model;

class UploadForms extends Model
{

    public $file;


    public function rules()
    {
        return [
            //[['file'], 'file', 'extensions'=>'jpg, gif, png'],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif'],
        ];
    }
}