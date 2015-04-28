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

	public function actionCreate()
	{
		return $this->render('UnderConstruction');
	}

	public function actionUpdate()
	{
		return $this->render('UnderConstruction');
	}

	public function actionPasstest()
	{
		return $this->render('UnderConstruction');
	}
}


?>
