<?php

namespace budyaga_cust\users\controllers;

use Yii;
use budyaga_cust\users\models\Mail;
use budyaga_cust\users\models\MailSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class MailController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'like' => ['POST'],
                    'block' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'view', 'delete', 'like', 'block'],
                'rules' => [
                    ['actions' => ['index'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['create'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['view'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['update'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['delete'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['like'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['block'], 'allow' => true, 'roles' => ['@'],],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $searchModel = new MailSearch();
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
        $model = new Mail();

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
            return $this->redirect(['view', 'id' => $model->id]);
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
    
    
    public function actionLike($id)
    {
        $like = $this->findModel($id);
        $like->pub = 1;
        $like->save();
        Yii::$app->session->setFlash('success', 'Сообщение успешно опубликовано');
        return $this->redirect(['index']);
    }
    
    
    public function actionBlock($id)
    {
        $like = $this->findModel($id);
        $like->pub = 2;
        $like->save();
        Yii::$app->session->setFlash('info', 'Сообщение заблокировано');
        return $this->redirect(['index']);
    }
    

    protected function findModel($id)
    {
        if (($model = Mail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
