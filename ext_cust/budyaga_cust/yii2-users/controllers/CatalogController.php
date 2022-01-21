<?php

namespace budyaga_cust\users\controllers;

use Yii;
use budyaga_cust\users\models\Catalog;
use budyaga_cust\users\models\CatalogSearch;
use budyaga_cust\users\models\Category;
use budyaga_cust\users\models\Scripts;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;



class CatalogController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'upload' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'view', 'delete', 'upload'],
                        'roles' => ['administrator'],
                    ],
                ],
            ],
        ];
    }

    
    public function actionIndex()
    {
        $searchModel = new CatalogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', ['searchModel' => $searchModel,'dataProvider' => $dataProvider,]);
    }


    public function actionView($id) {
        $model = $this->findModel($id);
        $int = Category::find()->where(['link' => $model->type,])->one();
        return $this->render('view', ['model' => $model, 'int' => $int,]);
    }

    public function actionCreate()
    {
        $model = new Catalog();
        $model->link = 'obj'.Scripts::getNameFile(); 
        $model->alhogole = ''; 
        $model->filter = 'sv';
        $model->time = time();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //$model->fullimg = UploadedFile::getInstances($model, 'fullimg');
            //$model->upload();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', ['model' => $model,]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //$model->fullimg = UploadedFile::getInstances($model, 'fullimg');
            //$model->upload();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', ['model' => $model,]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
    
//    public function actionUpload($id)
//    {
//        $model = $this->findModel($id);
//        $model->fullimg = UploadedFile::getInstances($model, 'fullimg');
//        if ( $model->validate() && $model->load() ) { 
//            $index = 1;
//            foreach ($model->fullimg as $file) {
//                $file->saveAs('gallery/' . date('dmY').'_verafund'.$file->baseName .$index++. '.' . $file->extension);
//                
//            }
//        }
//        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//        return $model->fullimg; 
//    }

    protected function findModel($id)
    {
        if (($model = Catalog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
