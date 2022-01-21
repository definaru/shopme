<?php

namespace budyaga_cust\users\models;

use budyaga_cust\users\models\Scripts;
use Yii;
/**
 * Description of Api
 *
 * @author Inc. Defina
 */
class Api 
{
    
    protected function viewUserByID($id)
    {
        return User::find()->where(['id' => $id]);
    } 
    
        
    public function getMyAccount()
    {
        $id = Yii::$app->user->identity->id;
        return self::viewUserByID($id)
            ->with('permissions', 'project')
            ->select('id, nickname, lastname, photo, contact_tel, email, api_key, status_pay, pay_other, balance, created_at, updated_at')
            ->asArray()
            ->one();
    }

    public function getPush($r = '0', $t = 'danger', $h = 'Error', $m = 'Page does not exist', $x = '404')
    {
        return [
            'result' => $r, 
            'type' => $t,
            'header' => $h,
            'message' => $m, 
            'code' => $x
        ];
    }

    public function getUser($id)
    {
        return self::viewUserByID($id)
            ->select('nik, photo, nickname, lastname, email, position, created_at')
            ->asArray()
            ->one();
    }

    public function isUser($id)
    { // Yii::$app->user->identity->id
        return self::viewUserByID($id)->exists();
    }
    
    public function errors() 
    { 
        return ['result' => '0', 'message' => 'Error: Page does not exist', 'code' => '404'];
    } 
    
    public function noApi() 
    { 
        return ['result' => '1', 'message' => 'Access denied: wrong API key is specified', 'code' => '403'];
    } 
    
    public function errorApi($apikey = '') 
    {
        // Yii::$app->user->identity->api_key
        $api = Scripts::getApiKey($apikey);
        return ($api == false) ? 0 : 1;
    }
    
    public function getCursUsd()
    {
        // Api::getCursUsd();
        $p = file_get_contents('https://openexchangerates.org/api/latest.json?app_id=a503228cb7be4b198a2858ea8a518d02');
        //$s = json_decode($p);
        return json_decode($p);
    }
    // 
    
}
