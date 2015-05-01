<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Users;


	class UsersController extends Controller
	{

	public function actionSignup()
		{
		    $model = new Users();

		    if ($model->load(Yii::$app->request->post())) {
		        if ($model->validate()) {
		            // form inputs are valid, do something here
		            return;
		        }
		    }

		    return $this->render('signup', [
		        'model' => $model,
		    ]);
		}





	}






?>