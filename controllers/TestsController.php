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
        $model = new \app\models\CategoryForm();
        if ($model->load(Yii::$app->request->post()))
        {
           
            $domainmodel = new \app\models\Category();
            
            $domainmodel->name = $model->name;
            $domainmodel->userid = \Yii::$app->user->id;
            $domainmodel->createdin = date("Y-m-d");
            
            $domainmodel->save();
            
             $model = new \app\models\CategoryForm();
            
            return $this->render('category', [
                'model' => $model,
            ]);
        
        } else {
            return $this->render('category', [
                'model' => $model,
            ]);
        }
    }

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
<<<<<<< HEAD

=======
>>>>>>> 8a3568ca41a3b5086f591aabf07443b43a142f60
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
<<<<<<< HEAD

=======
>>>>>>> 8a3568ca41a3b5086f591aabf07443b43a142f60
    /**
     * Creates a new Tests model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tests();
<<<<<<< HEAD

=======
>>>>>>> 8a3568ca41a3b5086f591aabf07443b43a142f60
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->testsid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
<<<<<<< HEAD

=======
>>>>>>> 8a3568ca41a3b5086f591aabf07443b43a142f60
    /**
     * Updates an existing Tests model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
<<<<<<< HEAD

=======
>>>>>>> 8a3568ca41a3b5086f591aabf07443b43a142f60
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->testsid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
<<<<<<< HEAD

=======
>>>>>>> 8a3568ca41a3b5086f591aabf07443b43a142f60
    /**
     * Deletes an existing Tests model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
<<<<<<< HEAD

        return $this->redirect(['index']);
    }

=======
        return $this->redirect(['index']);
    }
>>>>>>> 8a3568ca41a3b5086f591aabf07443b43a142f60
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
