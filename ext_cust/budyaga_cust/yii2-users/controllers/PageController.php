<?php

namespace budyaga_cust\users\controllers;

use Yii;
use budyaga_cust\users\models\Page;
use budyaga_cust\users\models\PageSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use budyaga\users\models\User;
use budyaga_cust\users\models\UploadForm;



class PageController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'view', 'update', 'delete'],
                'rules' => [
                    ['actions' => ['index'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['create'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['view'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['update'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['delete'], 'allow' => true, 'roles' => ['@'],],
                ],
            ],
        ];
    }
    
    
    public function actionIndex()
    {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new Page();
	$model->land = Yii::$app->site->lang;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //if (Yii::$app->request->isPost) {
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           // $model->slider = UploadedFile::getInstance($model, 'slider');
            //if ($model->upload()) {
                return $this->redirect(['view', 'id' => $model->id]);
            //}
        } else {
            return $this->render('update', ['model' => $model,]);
        }
    } 
    
//    public function actionUpdate($id)
//    {
//        $model = new UploadForm();
//        $model->loadModel($this->findModel($id));
//
//        if ($model->load(Yii::$app->request->post())) {
//            $model->slider = UploadedFile::getInstance($model, 'slider');
//            if ($model->validate() && $model->slider) {
//                $model->saveModel(true);
//                return $this->redirect(['view', 'id' => $model->getModel()->id]);
//            }
//        }
//        return $this->render('update', ['model' => $model,]);
//    }    
    


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
