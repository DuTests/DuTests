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



				$user[0]->name = "Janis";
				$user[0]->surname = "Ozols";
				$user[0]->nickname = "JaOz22";
				$user[0]->email = "email@email.com";
				$user[0]->age = 25;
				$user[0]->password = md5("qwerty");
				$user[0]->save();

				$user[1]->name = "Peteris";
				$user[1]->surname = "Klava";
				$user[1]->nickname = "PeKl20";
				$user[1]->email = "peteris@mail.ru";
				$user[1]->age = 20;
				$user[1]->password = md5("qwerty");
				$user[1]->save();

				$user[2]->name = "Ilze";
				$user[2]->surname = "Puke";
				$user[2]->nickname = "IlPu";
				$user[2]->email = "ilze@mail.ru";
				$user[2]->age = 19;
				$user[2]->password = md5("qwerty");
				$user[2]->save();

				$user[3]->name = "Anna";
				$user[3]->surname = "Zale";
				$user[3]->nickname = "AnZa";
				$user[3]->email = "anna@mail.cn";
				$user[3]->age = 20;
				$user[3]->password = md5("qwerty");
				$user[3]->save();
	
		}

	}












?>