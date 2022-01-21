<?php

namespace budyaga_cust\users\controllers;
use budyaga_cust\users\models\Menudefina;
//use budyaga_cust\users\models\AuthItemSearch;
//use budyaga_cust\users\models\AuthRuleSearch;
//use budyaga_cust\users\models\forms\AssignmentForm;
use Yii;
//use yii\rbac\Item;
//use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class DefinaController extends Controller
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
                    ['actions' => ['index'], 'allow' => true, 'roles' => ['administrator'],],
                    //['actions' => ['create'], 'allow' => true, 'roles' => ['@'],],
                    //['actions' => ['view'], 'allow' => true, 'roles' => ['@'],],
                    //['actions' => ['update'], 'allow' => true, 'roles' => ['@'],],
                    //['actions' => ['delete'], 'allow' => true, 'roles' => ['@'],],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $menu = Menudefina::find()->where(['access' => 0])->all();
        return $this->render('index', ['menu' => $menu]);
    }



}
