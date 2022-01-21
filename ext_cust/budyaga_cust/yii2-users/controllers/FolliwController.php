<?php

    namespace budyaga_cust\users\controllers;

    use Yii;
    use budyaga_cust\users\models\Folliw;
    use budyaga_cust\users\models\FolliwSearch;
    use yii\filters\AccessControl;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use yii\filters\VerbFilter;

/**
 * FolliwController implements the CRUD actions for Folliw model.
 */
class FolliwController extends Controller
{
    /**
     * @inheritdoc
     */
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
                    ['actions' => ['create'], 'allow' => true, 'roles' => ['@'],],
                    //['actions' => ['view'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['update'], 'allow' => true, 'roles' => ['@'],],
                    ['actions' => ['delete'], 'allow' => true, 'roles' => ['@'],],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new FolliwSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Folliw();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
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

    protected function findModel($id)
    {
        if (($model = Folliw::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
