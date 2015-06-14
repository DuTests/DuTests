<?php
namespace app\controllers;
use Yii;
use app\models\Tests;
use app\models\TestsSearch;
use app\models\Categories;
use app\models\CategorySearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Category;
use app\models\CategoryForm;
use app\models\CreateTest;

class TestsController extends Controller
{
	public function actionResults($msg = "Hello this is testing of 'Results' controller.")
	{
		return $this->render('index', ['message' => $msg]);
	}
	public function actionCreatetest()
    {
        $model = new CreateTest();
        
        if($model->load(Yii::$app->request->post()) && $model->validate())
        {

        }
        else 
        {
            return $this->render('createtest', ['model' => $model]);
        }
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
            $domainmodel = new Category();
            
            $domainmodel->category = $model->name;

            $domainmodel->save();
            
            $model = new CategoryForm();
            
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
    
    public function actionIndex()
    {
        $searchModel = new TestsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionCategories()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('categories', [
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
        $model = new Tests();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->testId]);
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
            return $this->redirect(['view', 'id' => $model->testId]);
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
        if (($model = Tests::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
