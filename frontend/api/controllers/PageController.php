<?php

namespace frontend\api\controllers;


use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use budyaga_cust\users\models\Faq;
use budyaga_cust\users\models\User;
use budyaga_cust\users\models\Catalog;
use budyaga_cust\users\models\Api;
use budyaga_cust\users\models\Performance;
use budyaga_cust\users\models\Scripts;
use budyaga_cust\users\models\Project;
use budyaga_cust\users\models\UploadForms;
use yii\web\NotFoundHttpException;


class PageController extends Controller
{
    
    public $enableCsrfValidation = false;
    
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    'Origin'                           => ['*'],
                    'Access-Control-Request-Method'    => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600
                ],
            ],
        ]);
    }
    
      
    public function actionUpload($dir = 'product/') 
    {
        Project::createFolder($dir);
        $temp = $_FILES['file']['tmp_name'];
        $path = Yii::getAlias('@frontend') .'/web/'.$dir.$_FILES['file']['name'];
        //uniqid().'.jpg'
        
        $image = file_get_contents($temp);
        $image = imagecreatefromstring($image);
        
        if($image) {
            $_FILES['file']['type'] === 'image/jpeg' ? imagejpeg($image, $path) : '';
            $_FILES['file']['type'] === 'image/png'  ? imagepng($image, $path)  : '';
            //imagejpeg($image, $path);
            imagedestroy($image);
            $data = [
               'name' => $_FILES['file']['name'], 
               'type' => $_FILES['file']['type'], 
               'size' => $_FILES['file']['size'],
               'date' => time()
            ];
            $res = ['result' => '1', 'message' => 'Uploaded file', 'file' => $data, 'code' => '200'];
        } else {
            $res = ['result' => '0', 'message' => 'Error: not uploaded is file', 'code' => '401'];
        }
        
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        return $response->data = $res;
    }
    
        
    public function actionCurrency()
    {
        // getMyAccount()
        // Yii::$app->user->identity->act
        $access = Yii::$app->user->isGuest;
        $state = Yii::$app->user->identity->act;
        if(Yii::$app->user->identity->id === '') {
            $res = '';
        } elseif($state === 1) {
            $res = ['result' => '0', 'message' => 'Please activate your account', 'code' => '200'];            
        } elseif($state === 3) {
            $res = [
                'result' => '0', 
                'message' => 'Access denied: Your account is blocked', 
                'code' => '403', 
                'url' => 'https://shopme.su/doc/block'
            ];
        } elseif($access === true) {
            $res =  [
                'result' => '0', 
                'message' => 'Access denied: Please register or log in', 
                'code' => '403', 
                'url' => 'https://shopme.su/login'
            ];
        } else {
            $res = Api::getMyAccount();
        }

        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        return $response->data = $res;
    }
    
    
    public function actionUser($id = '')
    {
        $user = Api::isUser($id);
        $access = Yii::$app->user->isGuest;

        if($id === '' || $user === false) {
            $res = ['result' => '0', 'message' => 'Error: User does not exist', 'code' => '404'];
        } elseif($access === true) {
            $res = ['result' => '0', 'message' => 'Access denied: Please register or log in', 'code' => '403'];
        } else {
            $res = Api::getUser($id);
        }

        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        return $response->data = $res;
    }
    
    public function actionError()
    {
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        return $response->data = Api::errors();
    }
    
    public function actionOne($link = '', $apiKey = '')
    {
        $model = Catalog::find()->asArray()->orderBy(['id' => SORT_ASC]);
        $json = ($link == '') ? $model->where(['filter' => 'api'])->all() : $model->where(['filter' => 'api', 'link' => $link])->one(); 
        $x = (Api::errorApi($apiKey) == 0) ? Api::noApi() : $json;
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        return $response->data = ($json == '') ? Api::errors() : $x;        
    }
    
    
    public function actionFaq($land = 'ru')
    {
        $model = Faq::find()->asArray()->orderBy(['id' => SORT_ASC])->where(['lands' => $land]);
        $json = $model->all();
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        return $response->data = $json;
    }
    
    public function actionAll($apiKey = '')
    {
        $model = Catalog::find()->asArray()->orderBy(['id' => SORT_ASC]);
        $json = $model->all(); 
        $x = (Api::errorApi($apiKey) == 0) ? Api::noApi() : $json;
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        return $response->data = $x;        
    }
    
    
    public function actionInfo($id = '', $filter = '', $limit = '', $apiKey = '')
    {
        $model = Catalog::find()->asArray()->orderBy(['id' => SORT_ASC]);
        $f = ($filter == '') ? ['id' => $id] : ['id' => $id, 'filter' => $filter];
        $z = ($limit ==  '') ? $model->all() : $model->limit($limit)->all();
        $json = ($id == '' || $id == 0) ? $z : $model->where($f)->one();
        $x = (Api::errorApi($apiKey) == 0 || $apiKey == '') ? Api::noApi() : $json;
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data = ($json == '') ? Api::errors() : $x;
        return $response->data;
    }
    
    public function actionSort($id = '', $filter = '', $limit = '', $apiKey = '')
    {
        $model = Catalog::find()->asArray()->orderBy(['id' => SORT_ASC]);
        $f = ($filter == '') ? $model->andFilterWhere(['id' => $id]) : $model->andFilterWhere(['id' => $id])->andFilterWhere(['like', 'filter', $filter]);
        $z = ($limit == '' || $limit == 0) ? $f->all() : $f->limit($limit)->all();
        $json = ($id == '' || $id == 0) ? $z : $f->one();
        $x = (Api::errorApi($apiKey) == 0 || $apiKey == '') ? Api::noApi() : $json;
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data = ($json == '') ? Api::errors() : $x;
        return $response->data;
    }
    
    public function actionObject($filter = '', $link = '', $apiKey = '')
    {
        $model = Catalog::find()->asArray()->orderBy(['id' => SORT_ASC]);
        $f = ($filter == '' || $link == '') ? Api::errors() : $model->andFilterWhere(['link' => $link])->andFilterWhere(['like', 'filter', $filter]);
        $json = $f->one();
        $x = (Api::errorApi($apiKey) == 0 || $apiKey == '') ? Api::noApi() : $json;
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data = ($json == '') ? Api::errors() : $x;
        return $response->data;
    }

    
    public function actionImage($id) 
    {
        $dir = 'gallery/'.$id.'/';
        $files = Scripts::getArrayImages($dir);
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; 
        //\Yii::$app->response->data = $files;
        return $files;
    }
    
    
}
