<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use budyaga_cust\users\models\Scripts;
//use yii\data\ActiveDataProvider;
use budyaga_cust\users\models\forms\ContactForm;
use budyaga_cust\users\models\Catalog;
use budyaga_cust\users\models\Zakaz;
use budyaga_cust\users\models\Docs;
use budyaga_cust\users\models\Top;
use budyaga_cust\users\models\User;
use budyaga_cust\users\models\Mail;
use budyaga_cust\users\models\Service;
use budyaga_cust\users\models\Slider;
use yii\web\UploadedFile;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['api'],
                'rules' => [
                    ['actions' => ['api'], 'allow' => true, 'roles' => ['@']],
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

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'foreColor' => 0xff7800,
                'fontFile' => '@yii/captcha/dancingscript-regular.ttf',
                'transparent' => true,
                'maxLength' => 6,
                'width' => 150,
                'height' => 60,
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    
    public function actionIndex() 
    { 
        $portfolios = Catalog::find()->where(['reception' => 'yes'])->orderBy(['sort' => SORT_ASC,])->all();
        $models = Service::find()->where(['land' => Yii::$app->language])->limit(Yii::$app->params['CountServis'])->orderBy(['id' => SORT_ASC,])->all();
        return $this->render('index', [
            'page' => Scripts::getPage(), 
            'models' => $models, 
            'portfolios' => $portfolios, 
            'service' => Scripts::getPage('service'),
            'portfolio' => Scripts::getPage('portfolio')
        ]);
    }  
    
    public function actionFaq()
    {
        return $this->render('faq', ['page' => Scripts::getPage()]);
    }  
    
    public function actionPortfolio($link = '')
    {
        $get = Yii::$app->request->get();
        $post = Yii::$app->request->post();
        $portfolios = Catalog::find()->orderBy(['sort' => SORT_ASC,])->all();
        $models = Catalog::find()->where(['link' => $link])->one();
        if($get) {
            $model = new Zakaz();
            $model->tz = '-';
            $model->price = '-';
            $model->pay = '-';
            $model->service = '-';
            $model->header = $link;
            $model->place = Scripts::getIp();
            $model->date = Scripts::getTime(); 
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('okZakaz');
                //Yii::$app->session->setFlash('date', $post['Zakaz']['date']);
                return $this->redirect('/portfolio/'.$link.'.html?s='.$post['Zakaz']['date']);
            }
        }
        return $this->render('portfolio', ['model' => $model, 'page' => Scripts::getPage(), 'link' => $link, 'portfolios' => $portfolios, 'models' => $models, 'get' => $get]);
        
    }

    
    public function actionService($link = '') 
    { 
        $get = Yii::$app->request->get();
        $list = Service::find()->where(['link' => $link, 'land' => Yii::$app->language])->one();
        $models = Service::find()->where(['land' => Yii::$app->language])->orderBy(['id' => SORT_ASC,])->all();
        if($get) {
            $model = new Zakaz();
            $model->tz = '-';
            $model->price = '-';
            $model->pay = '-';
            $model->service = '-';
            $model->header = $list->title;
            $model->place = Scripts::getIp();
            $model->date = Scripts::getTime(); 
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('contactFormSubmitted');
                return $this->redirect('/service');
            }
        }
        return $this->render('service', ['model' => $model, 'models' => $models, 'link' => $link, 'page' => Scripts::getPage(), 'get' => $get, 'list' => $list]);
    }  
    
    public function actionPartners() 
    { 
        $model = Slider::find()->where(['link' => 'partners', 'lang' => Yii::$app->language])->one();
        return $this->render('partners', ['page' => Scripts::getPage(), 'model' => $model]);
    }  
    
    public function actionTemplate() 
    { 
        return $this->render('template', ['page' => Scripts::getPage()]);
    }  
    
    public function actionAbout()
    {
        $dominat = Top::find()->limit(6)->orderBy(['id' => SORT_DESC,])->all();
        return $this->render('about', ['dominat' => $dominat, 'page' => Scripts::getPage()]);
    }  
    
    public function actionDoc($href = '')
    {
        $get = Docs::find()->where(['href' => $href, 'land' => Yii::$app->language])->one();
        //if (null === $get || $get == '') {return $this->redirect('/doc');} 
        return $this->render('doc', ['get' => $get, 'href' => $href]);
    } 
    
    public function actionZakaz() 
    { 
        $models = Service::find()->where(['land' => Yii::$app->language])->orderBy(['id' => SORT_ASC,])->all();
        $post = Yii::$app->request->post();
        $model = new Zakaz();
        $model->tz = '-';
        $model->price = '-';
        $model->pay = '-';
        $model->service = '-';
        $model->place = Scripts::getIp();
        $model->date = Scripts::getTime(); 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             Yii::$app->session->setFlash('contactFormSubmitted');
             Yii::$app->session->setFlash('date', $post['Zakaz']['date']);
        }
        return $this->render('zakaz', ['model' => $model, 'models' => $models]);
    }  
    
    public function actionTicket($date = '') 
    {
        $model = Zakaz::find()->where(['date' => $date])->one();
        $list = Zakaz::find()->all();
        return $this->render('ticket', ['model' => $model, 'date' => $date, 'list' => $list]);
    }

	
    public function actionContact()
    {
        $params = Yii::$app->user->identity;
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->sendEmail(Scripts::funcMail())) {
            $file = UploadedFile::getInstance($model, 'file');
            if ($file && $file->tempName) { $model->file = $file;
                if ($model->validate(['file'])) {
                    $dir = Yii::getAlias('documentation/');
                    $fileName = Scripts::getNameFile() . '.' . $model->file->extension; //$model->file->baseName
                    $model->file->saveAs($dir . $fileName);
                    $model->file = $fileName; // без этого ошибка
                    $model->file = '/'.$dir . $fileName;
                }
            } 
            Yii::$app->session->setFlash('contactFormSubmitted');
            $email = new Mail();
            $email->attributes = $model->attributes;
            if(!$email->save()){ //Yii::$app->session->setFlash('errorMessag');
                throw new \yii\web\HttpException(500, 'Невозможно сохранить');
            } return $this->refresh(); 
        } 
        return $this->render('contact', ['model' => $model, 'page' => Scripts::getPage(), 'site' => Scripts::getViewHeader(), 'user' => User::findOne($params->id), 'params' => $params]);
    }
    

}
