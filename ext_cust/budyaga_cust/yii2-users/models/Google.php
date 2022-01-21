<?php

namespace budyaga_cust\users\models;

use Yii;
use Google_Client;
//use Google_Service_Drive;
//use Google_Service_Oauth2;
//use Google_Service_Plus;
//use budyaga_cust\users\models\Scripts;
//use Google_Service_Exception; 

/*
 * Author: Defina LLC
 * Site: https://defina.ru
 * Create Date: 15/09/2019
 * E-mail: info@defina.ru
 * License: GNU v3.
 */

class Google 
{
    
    public $Client_Id; // Yii::$app->google->Client_Id;
    
    public $Secret; // Yii::$app->google->Secret;
    
    public $RedirectUri; // Yii::$app->google->RedirectUri;

    
    public function getClientGoogle() 
    {
        $client = new Google_Client();
        $client->setClientId(Yii::$app->google->Client_Id);
        $client->setClientSecret(Yii::$app->google->Secret);
        $client->setRedirectUri(Yii::$app->google->RedirectUri);
        //$client->setScopes("email");
        $client->setScopes(array('https://www.googleapis.com/auth/userinfo.email','https://www.googleapis.com/auth/userinfo.profile', 'https://www.googleapis.com/auth/plus.me'));
        $loginUrl = $client->createAuthUrl();
        return $loginUrl;
    }

    public function GetUserProfileInfo($access_token) 
    {	
        $url = 'https://www.googleapis.com/userinfo/v2/me?fields=email,family_name,gender,given_name,hd,id,link,locale,name,picture,verified_email';	
        $ch = curl_init();		
        curl_setopt($ch, CURLOPT_URL, $url);		
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);		
        if($http_code != 200) 
                throw new \Exception('Error : Failed to get user information');

        return $data;
    }
    
    public function getTokenGoogle() 
    {
        $gclient = new Google_Client();
        $gclient->setClientId(Yii::$app->google->Client_Id);
        $gclient->setClientSecret(Yii::$app->google->Secret);
        $gclient->setRedirectUri(Yii::$app->google->RedirectUri);
        //$gclient->setAccessType('offline');
        $gclient->setScopes(array('https://www.googleapis.com/auth/userinfo.email','https://www.googleapis.com/auth/userinfo.profile', 'https://www.googleapis.com/auth/plus.me'));
        

        $get = Yii::$app->request->get();
        $result = $get['code'];
        if($result)
        {
            try {
                $token = $gclient->fetchAccessTokenWithAuthCode($result);
                $gclient->setAccessToken($token);
                $oAuth = new \Google_Service_Oauth2($gclient);
                $data = $oAuth->userinfo_v2_me->get();
                //$data = $oAuth->userinfo->get();
                return $data;
            } catch (\Exception $e) { // Google_Service_Exception 
                echo $e->getMessage();
            }
            try {
                $pay_load = $gclient->verifyIdToken();
                //print_r(self::GetUserProfileInfo($pay_load));
            } catch (\Exception $e) { // Google_Service_Exception 
                echo $e->getMessage();
            }
        } else {
            $pay_load = null;
        }
        //return 'https://www.googleapis.com/oauth2/v1/userinfo?alt=json&access_token='.$result->access_token;    
                
    } 
    
}
