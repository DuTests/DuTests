<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UserForm;
use app\models\TestForm;
use app\models\Getq;
use app\models\Question;
use app\models\Answer;

class QuestionController extends Controller
{
	public function actionIndex(){

		$model=new Getq();
		$c;
        if ($model->load(Yii::$app->request->post())) {
        	if($model->correct==1)
        	{
        		$c=$model->a1;

        		$q=new Question();
            	$q->question=$model->question;
            	$q->categoryId = $model->category;
           		$q->save();
          		$qid = Question::find()->where(['question' => $model->question])->one()['questionId'];

	          	$a=new Answer();
	            $a->answer=$model->a2;
	            $a->questionId=$qid;
	            $a->save();
	            
	            $a=new Answer();
	            $a->answer=$model->a3;
	            $a->questionId=$qid;
	            $a->save();

	           	$a=new Answer();
	            $a->answer=$model->a4;
	            $a->questionId=$qid;
	            $a->save();

	            $a=new Answer();
	            $a->answer=$model->a1;
	            $a->questionId=$qid;
	            $a->save();

	            $aid = Answer::find()->where(['answer' => $c])->one()['answerId'];

	            $q=Question::find()->where(['question' => $model->question])->one();
	            $q->correctAnswerId=$aid;
	            $q->save();
        	}
        	else if($model->correct==2)
        	{
        		$c=$model->a2;

        		$q=new Question();
            	$q->question=$model->question;
            	$q->categoryId = $model->category;
           		$q->save();
          		$qid = Question::find()->where(['question' => $model->question])->one()['questionId'];

	          	$a=new Answer();
	            $a->answer=$model->a1;
	            $a->questionId=$qid;
	            $a->save();
	            
	            $a=new Answer();
	            $a->answer=$model->a3;
	            $a->questionId=$qid;
	            $a->save();

	           	$a=new Answer();
	            $a->answer=$model->a4;
	            $a->questionId=$qid;
	            $a->save();

	            $a=new Answer();
	            $a->answer=$model->a2;
	            $a->questionId=$qid;
	            $a->save();

	            $aid = Answer::find()->where(['answer' => $c])->one()['answerId'];

	            $q=Question::find()->where(['question' => $model->question])->one();
	            $q->correctAnswerId=$aid;
	            $q->save();
        	}
        	else if($model->correct==3)
        	{
        		$c=$model->a3;

        		$q=new Question();
            	$q->question=$model->question;
            	$q->categoryId = $model->category;
           		$q->save();
          		$qid = Question::find()->where(['question' => $model->question])->one()['questionId'];

	          	$a=new Answer();
	            $a->answer=$model->a1;
	            $a->questionId=$qid;
	            $a->save();
	            
	            $a=new Answer();
	            $a->answer=$model->a2;
	            $a->questionId=$qid;
	            $a->save();

	           	$a=new Answer();
	            $a->answer=$model->a4;
	            $a->questionId=$qid;
	            $a->save();

	            $a=new Answer();
	            $a->answer=$model->a3;
	            $a->questionId=$qid;
	            $a->save();

	            $aid = Answer::find()->where(['answer' => $c])->one()['answerId'];

	            $q=Question::find()->where(['question' => $model->question])->one();
	            $q->correctAnswerId=$aid;
	            $q->save();
        	}
        	else if($model->correct==4)
        	{
        		$c=$model->a4;

        		$q=new Question();
            	$q->question=$model->question;
            	$q->categoryId = $model->category;
           		$q->save();
          		$qid = Question::find()->where(['question' => $model->question])->one()['questionId'];

	          	$a=new Answer();
	            $a->answer=$model->a1;
	            $a->questionId=$qid;
	            $a->save();
	            
	            $a=new Answer();
	            $a->answer=$model->a2;
	            $a->questionId=$qid;
	            $a->save();

	           	$a=new Answer();
	            $a->answer=$model->a3;
	            $a->questionId=$qid;
	            $a->save();

	            $a=new Answer();
	            $a->answer=$model->a4;
	            $a->questionId=$qid;
	            $a->save();

	            $aid = Answer::find()->where(['answer' => $c])->one()['answerId'];

	            $q=Question::find()->where(['question' => $model->question])->one();
	            $q->correctAnswerId=$aid;
	            $q->save();
        	}







			
           return $this->render('index-confirm', ['mod' => $model,'c'=>$c,'qid'=>$qid]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('index', ['mod' => $model]);
        }
		//return $this->render('index');
	}
}
