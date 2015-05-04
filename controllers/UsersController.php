<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Users;
use app\models\User;
use app\models\LoginForm;
use app\models\RegisterForm;


	class UsersController extends Controller
	{

	public function actionSignup()
		{
		    $model = new Users();

		    if ($model->load(Yii::$app->request->post())) {
		        if ($model->validate()) {
		            return;
		        }
		    }

		    return $this->render('signup', [
		        'model' => $model,
		    ]);
		}

	public function actionLogin()
	    {
	        if (!\Yii::$app->user->isGuest) {
	            return $this->goHome();
	        }

	        $model = new LoginForm();
	        if ($model->load(Yii::$app->request->post()) && $model->login()) {
	            return $this->goBack();
	        } else {
	            return $this->render('login', [
	                'model' => $model,
	            ]);
	        }
	    }

	}






?>