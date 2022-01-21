<?php
    namespace budyaga_cust\users\controllers;

    use Yii;
    use yii\filters\AccessControl;
    use yii\web\Controller;
    //use yii\web\NotFoundHttpException;
    use yii\filters\VerbFilter;


class CodeController extends Controller {

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
                    ['actions' => ['index'], 'allow' => true, 'roles' => ['moderator'],],
                    //['actions' => ['create'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['view'], 'allow' => true, 'roles' => ['moderator'],],
                    //['actions' => ['update'], 'allow' => true, 'roles' => ['@'],],
                    //['actions' => ['delete'], 'allow' => true, 'roles' => ['@'],],
                ],
            ],
        ];
    }


    public function actionIndex() {
        //$searchModel = new CitySearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider,]);
        return $this->render('index');
    }


//    public function actionView() {    
//        return $this->render('view');
//    }
    
    public function actionView() {
        $sigma = '../config/params.php';
        $post = Yii::$app->request->post();
        $ok = $post['send'];
        if (isset($ok)) {
            $file = $sigma;
            $fp = fopen($file, "w"); // Открываем файл в режиме записи 
            $fp = fopen($file, "r+"); // Открываем файл в режиме записи 
            $text = $post['robot']; // Исходная строка $post['code']
            $sends = fwrite($fp, $text); // Запись в файл
            if ($sends) {
                Yii::$app->getSession()->setFlash('info', 'Файл успешно записан');
                return $this->redirect(['view']);
            } else{
                Yii::$app->getSession()->setFlash('error', 'Ошибка при записи в файл.');
            } 
            fclose($fp); //Закрытие файла	            

        }
        return $this->render('view', ['sigma' => $sigma]);
    }    
    
    
//    public function actionCreate() {
//        $model = new City();
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['index']);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
//    }

//    public function actionUpdate($id) {
//        $model = $this->findModel($id);
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['index']);
//        } else {
//            return $this->render('update', ['model' => $model,]);
//        }
//    }

//    public function actionDelete($id) {
//        $this->findModel($id)->delete();
//        return $this->redirect(['index']);
//    }

//    protected function findModel($id) {
//        if (($model = City::findOne($id)) !== null) {
//            return $model;
//        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
//        }
//    }
}
