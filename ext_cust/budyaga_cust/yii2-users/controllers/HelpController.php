<?php

namespace budyaga_cust\users\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
/**
 * Default controller for the `defina` module
 */
class HelpController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'view', 'update', 'delete'],
                'rules' => [
                    ['actions' => ['index'], 'allow' => true, 'roles' => ['@'],],
                    //['actions' => ['create'], 'allow' => true, 'roles' => ['@'],],
                    //['actions' => ['view'], 'allow' => true, 'roles' => ['@'],],
                    //['actions' => ['update'], 'allow' => true, 'roles' => ['@'],],
                    //['actions' => ['delete'], 'allow' => true, 'roles' => ['@'],],
                ],
            ],            
        ];
    }


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }
}
