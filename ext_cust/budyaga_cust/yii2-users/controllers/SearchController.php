<?php

namespace budyaga_cust\users\controllers;

use Yii;
use budyaga_cust\users\models\MenudefinaSearch;
//use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
//use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class SearchController extends Controller
{
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
                'only' => ['index'],
                'rules' => [
                    ['actions' => ['index'], 'allow' => true, 'roles' => ['administrator']],
                ],
            ],            
        ];
    }
    
    
    public function actionIndex()
    {
        $searchModel = new MenudefinaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    
}
