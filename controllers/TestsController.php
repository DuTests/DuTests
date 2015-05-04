<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;


/**
* 
*/
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
}


?>
