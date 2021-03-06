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
use app\models\Question;
use app\models\TestQuestions;


class TestsController extends Controller
{
	public function actionResults($msg = "Hello this is testing of 'Results' controller.")
	{
		return $this->render('index', ['message' => $msg]);
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
        $model = new CategoryForm();

        if ($model->load(Yii::$app->request->post()))
        {

            $existing = Category::getCategoryByName($model->name);
            
            if($existing<1)
            {
                $domainmodel = new Category();

                $domainmodel->category = $model->name;

                $domainmodel->save();

                $model = new CategoryForm();

                Yii::$app->getSession()->setFlash('success', '<b>Category created successfully</b>');
            }
            else
            {
               $model->addError("name", "Category already exist");
            }

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
        $model = new CreateTest();
        
        if($model->load(Yii::$app->request->post()))
        {
            
            $test = new Tests;
            $test->testName = $model->testName;
            $test->startDate = $model->startDate;
            $test->endDate = $model->endDate;
            $test->categoryId = $model->category;
            $test->minPercent = $model->minPercent;
            $test->categoryName = Category::find()->where(['categoryId' => $model->category])->one()->category;
            $test->save();

            $questionInput = $model->selectQuestions;
            
            $questions = CreateTest::getQuestions($model->category);
            $questionCount = count($questions);

            if($questionInput > $questionCount)
            {
                Yii::$app->session->setFlash('error', 'Database has less question than you want');
            }
            else
            {
                for($i = 1; $i < $questionInput; $i++)
                {
                    $testQuestion = new TestQuestions();
                    $testQuestion->testId = $test->testId;
                    $testQuestion->questionId = $questions[$i]->questionId;
                    $testQuestion->save();
                }

                return $this->redirect('index');
            }

            return $this->render('create', ['model' => $model]);
        }
        else 
        {
            return $this->render('create', ['model' => $model]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->categoryName = Category::find()->where(['categoryId' => $model->categoryId])->one()->category;
            $model->save();

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
    public function actionPass($id)
	{
		$model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->testId]);
        } else {
            return $this->render('pass', [
                'model' => $model,
            ]);
        }
	}
}
