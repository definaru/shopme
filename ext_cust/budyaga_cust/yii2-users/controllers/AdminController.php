<?php

namespace budyaga_cust\users\controllers;

use Yii;
use budyaga_cust\users\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use budyaga_cust\users\models\forms\AssignmentForm;
//use budyaga_cust\users\models\User;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;
use budyaga_cust\users\models\Scripts;
use budyaga_cust\users\voicecms\Voice;
use budyaga_cust\users\voicecms\Namevoiceru;


class AdminController extends Controller
{
    private $_model = false;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'del' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'view', 'update', 'delete', 'permissions', 'list'],
                'rules' => [
                    ['actions' => ['index'], 'allow' => true, 'roles' => ['moderator'],],
                    ['actions' => ['create'], 'allow' => true, 'roles' => ['moderator'],],
                    ['actions' => ['view'], 'allow' => true, 'roles' => ['moderator'],],
                    ['actions' => ['update'], 'allow' => true, 'roles' => ['administrator'],],
                    ['actions' => ['delete'], 'allow' => true, 'roles' => ['moderator'],],
                    ['actions' => ['permissions'], 'allow' => true, 'roles' => ['moderator'],],
                    ['actions' => ['list'], 'allow' => true, 'roles' => ['moderator'],],
                ],
            ],
                
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'actions' => ['index'],
//                        'roles' => ['administrator'],
//                    ],
//                    [
//                        'allow' => true,
//                        'actions' => ['create'],
//                        'roles' => ['userCreate'],
//                    ],
//                    [
//                        'allow' => true,
//                        'actions' => ['view'],
//                        'roles' => ['userView'],
//                    ],
//                    [
//                        'allow' => true,
//                        'actions' => ['update'],
//                        'matchCallback' => function ($rule, $action) {
//                            return Yii::$app->user->can('userUpdate', ['user' => $this->findModel(Yii::$app->request->get('id'))]);
//                        }
//                    ],
//                    [
//                        'allow' => true,
//                        'actions' => ['delete'],
//                        'roles' => ['userDelete'],
//                    ],
//                    [
//                        'allow' => true,
//                        'actions' => ['permissions'],
//                        'roles' => ['userPermissions'],
//                    ],
//                ],

        ];
    }


    public function actionIndex() {
        $dataProvider = new ActiveDataProvider(['query' => User::find(), 'pagination' => ['pageSize' => 6,],]);
        return $this->render('index', ['dataProvider' => $dataProvider,]);
    }


    public function actionView($id)
    { 
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionList() 
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where(['position' => 'партнёр'])->orderBy('created_at DESC'),
            'pagination' => [
                'pageSize' => 100, // говоришь системе мне нужно вывести 20 записей
            ],
        ]); 
        return $this->render('list', ['dataProvider' => $dataProvider]);
    }
    


    public function actionCreate()
    {
        $model = new User();
        if ($model->load(Yii::$app->request->post())) {
            $model->get_api_key();
            $model->status_pay = Yii::$app->request->post()['User']['status_pay'];
            $model->setPassword(Yii::$app->request->post()['User']['password_hash']);
            $model->generateAuthKey();
            if ($model->save()) {
                $model->price_default($model->id);
                $model->role_default($model->id);
                    return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'photo');
            if ($file && $file->tempName) {
                $model->photo = $file;
                if ($model->validate(['file'])) {
                    $dir = Yii::getAlias('img/avatar/');
                    $fileName = $model->photo->baseName . '.' . $model->photo->extension;
                    $model->photo->saveAs($dir . $fileName);
                    $model->photo = $fileName; // без этого ошибка
                    $model->photo = $dir . $fileName;
                    $photo = Image::getImagine()->open(Yii::getAlias('@webroot'.'/'.$dir . $fileName));
                    $photo->thumbnail(new Box(800, 800))->save(Yii::getAlias('@webroot'.'/'.$dir . $fileName), ['quality' => 90]);
                    //Yii::$app->controller->createDirectory(Yii::getAlias('img/catalog/thumbs')); 
                    Image::thumbnail(Yii::getAlias('@webroot'.'/'.$dir . $fileName), 200, 200)->save(Yii::getAlias('@webroot/'.$dir .'thumbs/'. $fileName), ['quality' => 80]);
                }
            }             
            $model->status_pay = Yii::$app->request->post()['User']['status_pay'];
            if(Yii::$app->request->post()['User']['password_hash'] !='') {
                $model->setPassword(Yii::$app->request->post()['User']['password_hash']);
            } else {
                $model->password_hash = Yii::$app->request->post()['User']['password_hash_old'];
            }
            $model->generateAuthKey();
            
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model, 
            ]);
        }
    }


    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
    
    
    public function actionDel($id){
        $model = $this->findModel($id);
        $model->photo = '';
        $model->save();
        return $this->redirect(['/user/admin/update?id='.$model->id]);
    }    
    
    

    public function actionPermissions($id) {
        $modelForm = new AssignmentForm;
        $modelForm->model = $this->findModel($id);
        if ($modelForm->load(Yii::$app->request->post()) && $modelForm->save()) {
            Yii::$app->session->setFlash('success', Yii::t('users', 'SUCCESS_UPDATE_PERMISSIONS'));
            return $this->redirect(['view', 'id' => $id]);
        }
        return $this->render('permissions', [
            'modelForm' => $modelForm
        ]);
    }
    

    
    

    protected function findModel($id) {
        if ($this->_model === false) {
            $this->_model = User::findOne($id);
        }
        if ($this->_model !== null) {
            return $this->_model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
