<?php

namespace app\controllers;

use Yii;
use app\models\Tests;
use app\models\TestsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TestsController implements the CRUD actions for Tests model.
 */
class TestsController extends Controller
{
<<<<<<< HEAD
	public function actionIndex($msg = "Hello this is testing of 'Tests' controller.")
	{
		return $this->render('index', ['message' => $msg]);
	}
	public function actionResults($msg = "Hello this is testing of 'Results' controller.")
	{
		return $this->render('index', ['message' => $msg]);
	}

	public function actionCreatetest()
	{
		return $this->render('UnderConstruction');
	}

	public function actionUpdatetest()
	{
		return $this->render('UnderConstruction');
	}

	public function actionPasstest()
	{
		return $this->render('UnderConstruction');
	}

	public function actionCreatequestion()
	{
		return $this->render('UnderConstruction');
	}

	public function actionUpdatequestion()
	{
		return $this->render('UnderConstruction');
	}

	public function actionDeletequestion()
	{
		return $this->render('UnderConstruction');
	}
        
        public function actionCreatecategory()
        {
            if (!\Yii::$app->user->isGuest) {
                return $this->goHome();
            }

            $model = new \app\models\CategoryForm();
            if ($model->load(Yii::$app->request->post())) {
                $model->createdin = time();
                $model->createdby = \Yii::$app->user->id;
                print_r("Successful, ToDo: Save to db");
            } else {
                return $this->render('category', [
                    'model' => $model,
                ]);
            }
        }
}
=======
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tests models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TestsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tests model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
>>>>>>> origin/DUT-13

    /**
     * Creates a new Tests model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tests();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->testsid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tests model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->testsid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tests model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tests model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tests the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tests::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
