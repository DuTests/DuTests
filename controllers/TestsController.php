<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;



class TestsController extends Controller
{
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


?>
