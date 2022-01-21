<?php
// MetaTraide Platform Affiliate
namespace frontend\admin\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use budyaga_cust\users\models\Affise;
use budyaga_cust\users\models\Docs;
use budyaga_cust\users\models\forms\ActiveUser;
use budyaga_cust\users\models\Scripts;



class PageController extends \yii\web\Controller 
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'smartlinks', 'news', 'new', 'profile', 'offer', 'offers', 'faq', 'support'],
                'rules' => [
                    ['actions' => ['index'],      'allow' => true, 'roles' => ['@']],
                    ['actions' => ['smartlinks'], 'allow' => true, 'roles' => ['@']],
                    ['actions' => ['news'],       'allow' => true, 'roles' => ['@']],
                    ['actions' => ['new'],        'allow' => true, 'roles' => ['@']],
                    ['actions' => ['profile'],    'allow' => true, 'roles' => ['@']],
                    ['actions' => ['offer'],      'allow' => true, 'roles' => ['@']],
                    ['actions' => ['offers'],     'allow' => true, 'roles' => ['@']],
                    ['actions' => ['faq'],        'allow' => true, 'roles' => ['@']],
                    ['actions' => ['support'],    'allow' => true, 'roles' => ['@']],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
    
    public function actionIndex() 
    { 
        $result = Affise::getPartnersID(14);
        $allPartner = Affise::getOffersAll();
        $model = Docs::find()->where(['href' => 'general_risk', 'land' => Yii::$app->language])->one();
        $page = (Yii::$app->user->identity->position == '') ? 'agree' : 'index';        
        
        
        $send = new ActiveUser();
        $send->name = Yii::$app->user->identity->nickname;
        $send->email = Yii::$app->user->identity->email;
        if ($send->load(Yii::$app->request->post()) && $send->sendEmail(Scripts::funcMail())) {
            Yii::$app->session->setFlash('YES_AGREE');
            //Yii::$app->getSession()->setFlash('YES_AGREE');
            return $this->refresh();
        } else {
            return $this->render($page, ['result' => $result, 'allPartner' => $allPartner, 'model' => $model, 'send' => $send]);
        }
    }  
    
    
//    public function actionAgree()
//    {
//        return $this->render('agree');
//    }  
    
    
    public function actionSmartlinks()
    {
        return $this->render('smartlinks');
    }
    
    public function actionSupport()
    {
        return $this->render('support');
    }
    
    public function actionChat()
    {
        return $this->render('chat');
    }
    
    public function actionSettings()
    {
        return $this->render('settings');
    }
    
    public function actionFaq()
    {
        return $this->render('faq');
    }

    
    
    public function actionNews()
    {
        $result = Affise::getPartnersID(14);
        return $this->render('news', ['result' => $result, 'news' => Affise::getNews($result->partner->api_key)]);
    }
    
    public function actionNew($id = '')
    {
        $get = Yii::$app->request->get();
        $result = Affise::getPartnersID(14);
        return $this->render('new', ['result' => $result, 'id' => $id, 'get' => $get, 'api' => $result->partner->api_key]);
    }
    
    
    public function actionProfile() 
    { 
        $result = Affise::getPartnersID(14);
        return $this->render('profile', ['result' => $result]);
    } 
    
    
    public function actionOffer($id = '')
    {
        $result = Affise::getOfferID($id);
        $get = Yii::$app->request->get();
        return $this->render('offer', ['result' => $result, 'id' => $id, 'get' => $get, 'adv' => Affise::getAdvertiserOne($result['offer']['advertiser'])]);
    }
    
    public function actionOffers()
    {
        //$result = Affise::getPartnersID(14);
        $allPartner = Affise::getOffersAll();
        return $this->render('offers', ['allPartner' => $allPartner]);
    }
    
    
    
    
}
