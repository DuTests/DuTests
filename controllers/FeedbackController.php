<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UserForm;
use app\models\TestForm;
use app\models\Feedback;

class FeedbackController extends Controller
{
	public function actionIndex() {
		$model = new Feedback();
        
        if($model->load(Yii::$app->request->post()))
        {
            $model->date = date("y.m.d");
            $model->userId = Yii::$app->user->identity->userId;
            $model->save();

            return $this->redirect('index');
        }
        else 
        {
            $model->feedbacks = FeedBack::find()->all();

            return $this->render('index', ['model' => $model]);
        }
	}
}

?>