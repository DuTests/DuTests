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
	
	public function actionIndex($msg = "Testing 'Tests' controller")
	{
		return $this->render('index', ['message' => $msg]);
	}
}


?>