<?php

namespace budyaga_cust\users\models\forms;

use Yii;
use yii\base\Model;
use budyaga_cust\users\models\Defina;


class UploadFile extends Model
{
    

    public static function tableName() 
    {
        return '1038_wisard';
    }
    
    
    public $skanpassfront;
    public $skanpassback;
    public $innname;
    public $status;




    public function rules()
    {
        return [
            ['innname', 'required', 'message' => 'Вы не указали ИНН'],
            [['skanpassfront'], 'file', 'skipOnEmpty' => false, 'extensions' => Defina::extensions, 'maxSize' => 10*1024*1024],
            [['skanpassback'], 'file', 'skipOnEmpty' => true, 'extensions' => Defina::extensions, 'maxSize' => 10*1024*1024],
            ['skanpassback', 'default', 'value' => '1'],
            ['status', 'default', 'value' => 100],
        ];
    }
    
    
    public function createFolder($param) 
    {
        return (!file_exists($param)) ? mkdir($param, 0777, true) : '';
    }
    
    
    public function createNameFolder($params = '') 
    {
        return ($params == 1) ? 'documentation' : Yii::$app->user->identity->nik;
    }
    
    
}
