<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

use app\models\Users;

	class InitController extends Controller
	{
		
		public function actionIndex()
		{	
	
				$user = array();
				$user[0] = new Users;
				$user[1] = new Users;
				$user[2] = new Users;
				$user[3] = new Users;


				$user[0]->FirstName = "Janis";
				$user[0]->LastName = "Ozols";
				$user[0]->Gender = 1;
				$user[0]->RegistrationDate = date("d.m.y");
				$user[0]->Username = "JaOz22";
				$user[0]->Age = 25;
				$user[0]->Email = "email@email.com";
				$user[0]->Password = Yii::$app->security->generatePasswordHash("qwerty");
				$user[0]->save();

				$user[1]->FirstName = "Peteris";
				$user[1]->LastName = "Klava";
				$user[1]->Gender = 1;
				$user[1]->RegistrationDate = date("d.m.y");
				$user[1]->Username = "PeKa25";
				$user[1]->Age = 25;
				$user[1]->Email = "peteris@email.com";
				$user[1]->Password = Yii::$app->security->generatePasswordHash("qwerty");
				$user[1]->save();		

				$user[2]->FirstName = "Ilze";
				$user[2]->LastName = "Klava";
				$user[2]->Gender = 0;
				$user[2]->RegistrationDate = date("d.m.y");
				$user[2]->Username = "IlKl25";
				$user[2]->Age = 78;
				$user[2]->Email = "ilze@email.com";
				$user[2]->Password = Yii::$app->security->generatePasswordHash("qwerty");
				$user[2]->save();		

				$user[3]->FirstName = "Anna";
				$user[3]->LastName = "Uzvards";
				$user[3]->Gender = 0;
				$user[3]->RegistrationDate = date("d.m.y");
				$user[3]->Username = "AnUz";
				$user[3]->Age = 19;
				$user[3]->Email = "anuz@email.com";
				$user[3]->Password = Yii::$app->security->generatePasswordHash("qwerty");
				$user[3]->save();		
	
		}

	}












?>