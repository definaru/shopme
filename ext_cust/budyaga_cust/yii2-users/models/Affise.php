<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\helpers\Html;
use GuzzleHttp\Client;
use budyaga_cust\users\models\Scripts;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use budyaga_cust\users\models\GeoApi;
use budyaga_cust\users\models\User;
/**
 * Description of Affise
 *
 * @author Defina LLC
 */
class Affise 
{
    
    public $url;
    
    public $partner;
    
    public $tracking;
    
    public $offers;

    public $key;
    
    public $USERID;



    public function getUserActive($email)
    {
        return User::find()->where(['email' => $email])->one();
    }

    
    
    
    public function getColorBandage($t) 
    {
        return strtr($t, array(
            'public' => Html::tag('span', Yii::t('yii', 'Get link'), ['class' => 'badge badge-success badge-pill']), // success
            'protected' => Html::tag('span', Yii::t('yii', 'Request access'), ['class' => 'badge badge-danger badge-pill']), // danger
            'private' => Html::tag('span', Yii::t('yii', 'Request access'), ['class' => 'badge badge-warning badge-pill']) // warning
        ));
    }
    
    public function getPartners() 
    {
        // Affise::getPartners() 
        $url = '/3.0/admin/partners?API-Key=';
        $url_ssl = Yii::$app->affise->url.$url.Yii::$app->affise->key; // Yii::$app->affise->url.Yii::$app->affise->key
        $client = new Client();
        try {
            $response = $client->request('GET', $url_ssl);
            //echo $response->getStatusCode(); # 200
            //echo $response->getHeaderLine('content-type');
            //print($response->getBody());
            $body = $response->getBody();
            $result = json_decode($body, true);
            return $result;
        } catch (ClientException $e) {
            return Html::tag('code', 'API адрес не верный, или больше не работает', ['class' => 'mb-5']);
        }
    }
    
    
    
    public function deleteCustomer($id)
    {
        $data_string = array('id' => $id);
        $url = '/3.0/partner/postback/'.$id.'/remove?API-Key=';
        $url_ssl = Yii::$app->affise->url.$url.Yii::$app->affise->key;
        $ch = curl_init($url_ssl);                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
        curl_setopt($ch, CURLOPT_FAILONERROR, true);                                                                    
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
//            'Content-Type: application/json',                                                                                
//            'Content-Length: ' . strlen($data_string))                                                                       
//        );                                                                                                                   

        $result = curl_exec($ch);
        return $result;
        
        
        
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url_ssl);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
//        $result = curl_exec($ch);
//        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//        curl_close($ch);
//
//        return $result;
    }
    
    
    public function getPartnersAdd($email, $password, $login)
    {
        $result = GeoApi::getAddress(Scripts::getIp());
        $url = '/3.0/admin/partner?API-Key=';
        $url_ssl = Yii::$app->affise->url.$url.Yii::$app->affise->key;
        $data = array(
            'email' => $email,
            'password' => $password,
            'login' => $login,
            'status' => 'active',
            'manager_id' => '5d775bc79f5184e0308326f6',
            'custom_fields[1]' => 'skype',
            'city' => $result->city,
            'country' => $result->country_code
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_ssl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        return curl_exec($ch);
        curl_close($ch);
    }
    
    
    public function getPartnersID($id) 
    {
        // Affise::getPartnersID($id) 
        $url = '/3.0/admin/partner/'.$id.'?API-Key=';
        $url_ssl = Yii::$app->affise->url.$url.Yii::$app->affise->key;
        $client = new Client();
        try {
            $response = $client->request('GET', $url_ssl);
            $body = $response->getBody();
            $result = json_decode($body);
            return $result;
        } catch (ClientException $e) {
            return Html::tag('code', 'API адрес не верный, или больше не работает', ['class' => 'mb-5']);
        }
    }
    
    public function getOfferID($id) 
    {
        // Affise::getPartnersID($id) 
        $url = '/3.0/offer/'.$id.'?API-Key=';
        $url_ssl = Yii::$app->affise->url.$url.Yii::$app->affise->key;
        $client = new Client();
        try {
            $response = $client->request('GET', $url_ssl);
            $body = $response->getBody();
            $result = json_decode($body, true);
            return $result;
        } catch (ClientException $e) {
            return Html::tag('code', 'API адрес не верный, или больше не работает', ['class' => 'mb-5']);
        }
    }
    
    // -------------------------------- Offers ---------------------------------
    public function getOffersAll() 
    {
        // Affise::getOffersAll() 
        $url = '/3.0/offers?API-Key=';
        $url_ssl = Yii::$app->affise->url.$url.Yii::$app->affise->key;
        $client = new Client();
        try {
            $response = $client->request('GET', $url_ssl);
            $body = $response->getBody();
            $result = json_decode($body, true);
            return $result;
        } catch (ClientException $e) {
            return Html::tag('code', 'API адрес не верный, или больше не работает', ['class' => 'mb-5']);
        }
    }
    
    public function getOffersOne($id) 
    {
        // Affise::getOffersAll() 
        $url = '/3.0/offer/'.$id.'?API-Key=';
        $url_ssl = Yii::$app->affise->url.$url.Yii::$app->affise->key;
        $client = new Client();
        try {
            $response = $client->request('GET', $url_ssl);
            $body = $response->getBody();
            $result = json_decode($body, true);
            return $result;
        } catch (ClientException $e) {
            return Html::tag('code', 'API адрес не верный, или больше не работает', ['class' => 'mb-5']);
        }
    }
    
    public function getAdvertiserOne($id) 
    {
        // Affise::getAdvertiserOne(5d7b7143ca6d0cb8d7362940) 
        $url = '/3.0/admin/advertiser/'.$id.'?API-Key=';
        $url_ssl = Yii::$app->affise->url.$url.Yii::$app->affise->key;
        $client = new Client();
        try {
            $response = $client->request('GET', $url_ssl);
            $body = $response->getBody();
            $result = json_decode($body);
            return $result;
        } catch (ClientException $e) {
            return Html::tag('code', 'API адрес не верный, или больше не работает', ['class' => 'mb-5']);
        }
    }
    
    public function getNews($api_partner)
    {
        // Affise::getNews();
        $url = '/3.0/news?API-Key=';
        $url_ssl = Yii::$app->affise->url.$url.$api_partner;
        $client = new Client();
        try {
            $response = $client->request('GET', $url_ssl);
            $body = $response->getBody();
            $result = json_decode($body, true);
            return $result;
        } catch (ClientException $e) {
            return Html::tag('code', 'API адрес не верный, или больше не работает', ['class' => 'mb-5']);
        }
    }
    
    public function getNewsID($id, $api_partner)
    {
        // Affise::getNews();
        $url = '/3.0/news/'.$id.'?API-Key=';
        $url_ssl = Yii::$app->affise->url.$url.$api_partner;
        $client = new Client();
        try {
            $response = $client->request('GET', $url_ssl);
            $body = $response->getBody();
            $result = json_decode($body, true);
            return $result;
        } catch (ClientException $e) {
            return Html::tag('code', 'API адрес не верный, или больше не работает', ['class' => 'mb-5']);
        }
    }
    
    // https://api-affiliatehub.affise.com/3.0/news?API-Key=e352e77502f9e56458d1b21077d368ac26392cc2
    
    
}
