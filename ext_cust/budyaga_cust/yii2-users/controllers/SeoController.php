<?php

namespace budyaga_cust\users\controllers;

use Yii;
//use budyaga_cust\users\models\Seo;
//use budyaga_cust\users\models\SeoSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use budyaga_cust\users\models\Index;
use hrupin\file\File;
use yii\web\UploadedFile;
use budyaga_cust\users\models\forms\SeoForm;

/**
 * MenudefinaController implements the CRUD actions for Menudefina model.
 */
class SeoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
             'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'view', 'update', 'delete', 'edit', 'sitemap', 'upload'],
                'rules' => [
                    ['actions' => ['index'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['create'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['view'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['update'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['delete'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['edit'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['sitemap'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['upload'], 'allow' => true, 'roles' => ['@'],],
                ],
            ],          
        ];
    }


    
    public function actionIndex()
    {
//        $searchModel = new SeoSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $seo = Index::findOne(1);
        return $this->render('index', ['seo' => $seo]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Seo();

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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionEdit()
    {
        $post = Yii::$app->request->post();
        $ok = $post['send'];
        if (isset($ok)) {
            $file = 'robots.txt';
            $fp = fopen($file, "w"); // Открываем файл в режиме записи 
            $fp = fopen($file, "r+"); // Открываем файл в режиме записи 
            $text = $post['robot']; // Исходная строка $post['code']
            $sends = fwrite($fp, $text); // Запись в файл
            if ($sends) {
                Yii::$app->getSession()->setFlash('info', 'Файл успешно записан');
                return $this->redirect(['edit']);
            } else{
                Yii::$app->getSession()->setFlash('error', 'Ошибка при записи в файл.');
            } 
            fclose($fp); //Закрытие файла	            

        }
        return $this->render('edit');
    }


    public function actionSitemap()
    {
        $post = Yii::$app->request->post();
        $ok = $post['send'];
        if (isset($ok)) {
            $file = 'sitemap.xml';
            $fp = fopen($file, "w"); // Открываем файл в режиме записи 
            $fp = fopen($file, "r+"); // Открываем файл в режиме записи 
            $text = $post['robot']; // Исходная строка $post['code']
            $sends = fwrite($fp, $text); // Запись в файл
            if ($sends) {
                Yii::$app->getSession()->setFlash('info', 'Файл успешно записан');
                return $this->redirect(['sitemap']);
            } else{
                Yii::$app->getSession()->setFlash('error', 'Ошибка при записи в файл.');
            } 
            fclose($fp); //Закрытие файла	            

        }
        return $this->render('sitemap');
    }
    
    
    public function actionUpload()
    {
        $model = new SeoForm();

        if (Yii::$app->request->post()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->upload()) {
                Yii::$app->getSession()->setFlash('success', 'Загрузка успешно завершена');
                return $this->redirect(['upload']);
            } else {
                Yii::$app->getSession()->setFlash('error', 'Произошла ошибка');
            }
        }

        return $this->render('upload', ['model' => $model]);
    }    
    
    


    protected function findModel($id)
    {
        if (($model = Seo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
