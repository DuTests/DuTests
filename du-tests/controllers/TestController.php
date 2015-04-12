<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class TestController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionShowtests()
    {
        return $this->render('showtests');
    }
    
    public function actionShowresults()
    {
        return $this->render('showresults');
    }
    
    public function actionCreateresult($testid)
    {
        $model = new \app\models\testResult();
        
        $model->test_id = $testid;
        
        $model->load(Yii::$app->request->post());

        if ($model->load(Yii::$app->request->post()) && $model->validate(null, false)) 
        {
            $model->save();
            
            return $this->redirect(array('test/updatetest','id'=>$model->test_id));
        }
        
        return $this->render('createtestresult', array(
                        'model' => $model,
            ));
    }
    
    public function actionCreatetest()
    {
        $model = new \app\models\Test();
        
        $model->load(Yii::$app->request->post());

        if ($model->load(Yii::$app->request->post()) && $model->validate(null, false)) 
        {
            $model->save();
            
            return $this->redirect(array('test/showtests')); 
        }
        
        return $this->render('createtest', array(
                        'model' => $model,
            ));
    }
    
    public function actionCreatequestion($testid)
    {
        $model = new \app\models\QuestionForm();
        $model->test_id = $testid;
        $model->controltypes = \app\models\Question::getControlTypes();
        $filename = '';
        
      
        if ($model->load(Yii::$app->request->post())&& $model->validate(null, false)) 
        {
            $dir = Yii::getAlias('@app/uploads/questions');
            $uploaded = false;
            $file = \yii\web\UploadedFile::getInstance($model,'image');
            $type = "";

            if(!is_null($file) && $file!=false)
            {
               $type = $file->type;
            if($file->size!=0 && ($type=='image/png' || $type=='image/jpeg'))
                {
                    $filetype='';
                    if($type=='image/png')
                    {
                        $filetype='.png';
                    }
                    else if($type=='image/jpeg')
                    {
                        $filetype='.jpg';
                    }

                    $filename =  uniqid().$filetype;
                    $uploaded = $file->saveAs($dir.'/'.$filename);

                    $model->image = $filename;

                }
            }
            

            
            $domainmodel = new \app\models\Question();
            $domainmodel->test_id = $model->test_id;
            $domainmodel->name = $model->name;
            $domainmodel->description = $model->description;
            $domainmodel->requiredanswercount = $model->requiredanswercount;
            
            if($filename!='')
            {
                $domainmodel->image = $filename;
            }
            $domainmodel->controltype = $model->controltype;
            
            $domainmodel->save();
            
            
            return $this->redirect(array('test/updatetest','id'=>$model->test_id)); 
        }
        return $this->render('createquestion', array(
                        'model' => $model,
            ));
        
    }
    
    public function actionShowresult($id)
    {
        $this->layout = 'mainsimple';
        
        $score = \app\models\testHistory::getUserTestResult($id);
        $history = new \app\models\testHistory();
        $history = \app\models\testHistory::getTestHistory($id);
        $test = \app\models\Test::getTest($history->test_id);
        
        $result = new \app\models\testResult();
        $result = \app\models\testResult::getUserTestResult($history->test_id, $score);
        
        /*print_r($result);
        die();*/
        return $this->render('showresult', array(
                        'result' => $result,
                        'test' => $test,
                        'score'=>$score,
                        'history'=>$history
            ));
    }
    
	
    public function actionCreateanswer($questionid)
    {
        $model = new \app\models\AnswerForm();
        $model->question_id = $questionid;
        $model->image = 'default.png';
        $domainmodel = new \app\models\Answer();
      
        if ($model->load(Yii::$app->request->post())&& $model->validate(null, false)) 
        {
            $dir = Yii::getAlias('@app/uploads/answers');
            $uploaded = false;
            $file = \yii\web\UploadedFile::getInstance($model,'image');
            $type = "";
            

            if(!is_null($file) && $file!=false)
            {
               $type = $file->type;
            if($file->size!=0 && ($type=='image/png' || $type=='image/jpeg'))
                {
                    $filetype='';
                    if($type=='image/png')
                    {
                        $filetype='.png';
                    }
                    else if($type=='image/jpeg')
                    {
                        $filetype='.jpg';
                    }

                    $filename =  uniqid().$filetype;
                    $uploaded = $file->saveAs($dir.'/'.$filename);

                    $model->image = $filename;

                }
            }
            
            $domainmodel->question_id = $model->question_id;
            $domainmodel->name = $model->name;
            $domainmodel->description = $model->description;
            $domainmodel->image = $model->image;
            $domainmodel->isvalid = $model->isvalid;
            $domainmodel->score = $model->score;
            $domainmodel->save();
            
            
            return $this->redirect(array('test/updateanswer','id'=>$domainmodel->id)); 
            
        }
		
        return $this->render('createanswer', array(
                        'model' => $model,
            ));
        
    }//actionCreateanswer
	
    public function actionUpdateresult($id)
    {
        $model = \app\models\testResult::getTestResult($id);
        

        if ($model->load(Yii::$app->request->post()) && $model->validate(null, false)) 
        {
            $model->save();
            
            return $this->redirect(array('test/updatetest','id'=>$model->test_id)); 
        }
        
        return $this->render('updateresult', array(
                        'model' => $model,
            ));
    }
	
    public function actionUpdatequestion($id)
    {
        $model = new \app\models\QuestionForm();
        $domainmodel = new \app\models\Question();
        $domainmodel = \app\models\Question::getQuestion($id);
        
        $model->test_id = $domainmodel->test_id;
        $model->name = $domainmodel->name;
        $model->description = $domainmodel->description;
        $model->id = $domainmodel->id;
        $model->image = $domainmodel->image;
        $model->controltype = $domainmodel->controltype;
        $model->controltypes = \app\models\Question::getControlTypes();
        $model->requiredanswercount = $domainmodel->requiredanswercount;
        

        if ($model->load(Yii::$app->request->post()) && $model->validate(null, false)) 
        {
            $dir = Yii::getAlias('@app/uploads/questions');
            $uploaded = false;
            $file = \yii\web\UploadedFile::getInstance($model,'image');
             $type = "";
             $filename ="";
            

            if(!is_null($file) && $file!=false)
            {
               $type = $file->type;
            if($file->size!=0 && ($type=='image/png' || $type=='image/jpeg'))
                {
                    $filetype='';
                    if($type=='image/png')
                    {
                        $filetype='.png';
                    }
                    else if($type=='image/jpeg')
                    {
                        $filetype='.jpg';
                    }

                    $filename =  uniqid().$filetype;
                    $uploaded = $file->saveAs($dir.'/'.$filename);

                    $model->image = $filename;

                }
            }
            $domainmodel = new \app\models\Question();
            $domainmodel = \app\models\Question::getQuestion($model->id);
            $domainmodel->test_id = $model->test_id;
            $domainmodel->name = $model->name;
            $domainmodel->description = $model->description;
            $domainmodel->requiredanswercount = $model->requiredanswercount;
            if($filename!='')
            {
                $domainmodel->image = $filename;
            }
            $domainmodel->controltype = $model->controltype;
            
            $domainmodel->save();
            
            return $this->redirect(array('test/updatetest','id'=>$model->test_id)); 
        }
        return $this->render('updatequestion', array(
                        'model' => $model,
            ));
    }//actionUpdatequestion
	
	
	public function actionPreparetest($id)
        {
            $success = true;
            
            $obj = \app\models\Test::prepareTest($id);
            $questions = $obj['questions'];
            for($i=0;$i<count($questions);$i++)
            {
                $questions[$i]['answers'] = \app\models\Answer::getQuestionAnswersAsArray($questions[$i]['id']);
                $questions[$i]['step'] = $i+1;
                if($questions[$i]['controltype']=='radio' || $questions[$i]['controltype']=='') $questions[$i]['radio'] = true;
                else if($questions[$i]['controltype']=='checkbox' || $questions[$i]['controltype']=='') $questions[$i]['checkbox'] = true;
                else if($questions[$i]['controltype']=='input' || $questions[$i]['controltype']=='') $questions[$i]['input'] = true;
            }
            $result = array("success"=>$success,"data"=>$questions,'testid'=>$obj['id'],'questioncount'=>count($questions));
            
            return json_encode($result);
        }
	
	
	
        public function actionUpdateanswer($id)
        {
		 //$model = new \app\models\Answer();
         //$model = \app\models\Answer::getAnswer($id);
        $model = new \app\models\AnswerForm();
        $domainmodel = new \app\models\Answer();
        $domainmodel = \app\models\Answer::getAnswer($id);

			
	$model->question_id = $domainmodel->question_id;
        $model->name = $domainmodel->name;
        $model->description = $domainmodel->description;
        $model->id = $domainmodel->id;
        if(isset($domainmodel->image) && $domainmodel->image!='')
        {
            $model->image = $domainmodel->image;
        }
        else
        {
            $model->image="default.png";
        }
        $model->isvalid = $domainmodel->isvalid;
        
        $model->score = $domainmodel->score;
        
        $domainmodel->isvalid = $model->isvalid;
        $domainmodel->score = $model->score;
			
			
			
			
            if ($model->load(Yii::$app->request->post()) && $model->validate(null, false)) 
            {
                
            $dir = Yii::getAlias('@app/uploads/answers');
            $uploaded = false;
            $file = \yii\web\UploadedFile::getInstance($model,'image');
             $type = "";
            

            if(!is_null($file) && $file!=false)
            {
               $type = $file->type;
            if($file->size!=0 && ($type=='image/png' || $type=='image/jpeg'))
                {
                    $filetype='';
                    if($type=='image/png')
                    {
                        $filetype='.png';
                    }
                    else if($type=='image/jpeg')
                    {
                        $filetype='.jpg';
                    }

                    $filename =  uniqid().$filetype;
                    $uploaded = $file->saveAs($dir.'/'.$filename);

                    $model->image = $filename;

                }
            }

            
                $domainmodel->question_id = $model->question_id;
                $domainmodel->name = $model->name;
                $domainmodel->description = $model->description;
                if($filename!='')
                {
                    $domainmodel->image = $filename;
                }
                $domainmodel->isvalid = $model->isvalid;
                $domainmodel->score = $model->score;
                $domainmodel->save();

                return $this->redirect(array('test/updatequestion','id'=>$domainmodel->question_id));
            }

            return $this->render('updateanswer', array(
                            'model' => $model,
                ));
        }//actionUpdateanswer
	
	
	
	
    public function actionUpdatetest($id)
    {
        $model = \app\models\Test::getTest($id);
        

        if ($model->load(Yii::$app->request->post()) && $model->validate(null, false)) 
        {
            $model->save();
            
            return $this->redirect(array('test/showtests')); 
        }
        
        return $this->render('updatetest', array(
                        'model' => $model,
            ));
    }
    
    public function actionGetresultsfeed()
    {
        $userid = 0;
        if(isset($_COOKIE["moodleid"])) 
        {
            $userid = $_COOKIE["moodleid"];
        } 
        
        $results = \app\models\testHistory::getUserResultsAsArray($userid);
        
        $success=true;
        
        $resultscount = count($results);
        
        if($resultscount<1)
        {
            $success = false;
        }
        
        $i=0;
        
        while($i<$resultscount)
        {
                $results[$i]['actions']='<div class="text-center"><div class="btn-group btn-group-sm">'.
                                        '<a type="button" href="showresult?id='.$results[$i]['id'].'"class="btn btn-default btn-update-relationship" data-id="'.$results[$i]['id'].'">Show Result</a>'.
                                      '</div></div>';
                $i++;
        }
            
        
        $response = array("success"=>$success,"data"=>$results);
            
        return json_encode($response);
    }
    
    public function actionGettestsfeed()
    {
        $tests = \app\models\Test::getTestsAsArray();
        
        $success=true;
        
        $testcount = count($tests);
        
        if($testcount<1)
        {
            $success = false;
        }
        
        $i=0;
        
        while($i<$testcount)
        {
                $tests[$i]['actions']='<div class="text-center"><div class="btn-group btn-group-sm">'.
                                        '<a type="button" href="updatetest?id='.$tests[$i]['id'].'"class="btn btn-default btn-update-relationship" data-id="'.$tests[$i]['id'].'">Update</a>'.
                                        '<a type="button" class="btn disabled btn-danger btn-delete-relationship" data-id="'.$tests[$i]['id'].'">Delete</a>'.
                                      '</div></div>';
                $i++;
        }
            
        
        $response = array("success"=>$success,"data"=>$tests);
            
        return json_encode($response);
        
    }
    
    public function actionGetanswersfeed($id)
    {
        $answers = \app\models\Answer::getQuestionAnswersAsArray($id);
        
        $success=true;
        
        $answercount = count($answers);
        
        if($answercount<1)
        {
            $success = false;
        }
        
        $i=0;
        
        while($i<$answercount)
        {
                $answers[$i]['actions']='<div class="text-center"><div class="btn-group btn-group-sm">'.
                                        '<a type="button" href="updateanswer?id='.$answers[$i]['id'].'"class="btn btn-default btn-update-relationship" data-id="'.$answers[$i]['id'].'">Update</a>'.
                                        '<a type="button" class="btn disabled btn-danger btn-delete-relationship" data-id="'.$answers[$i]['id'].'">Delete</a>'.
                                      '</div></div>';
                $i++;
        }
            
        
        $response = array("success"=>$success,"data"=>$answers);
            
        return json_encode($response);
        
    }
    
    public function actionGettestresultsfeed($id)
    {
        $results = \app\models\testResult::getTestResultsAsArray($id);
        
        $success=true;
        
        $resultscount = count($results);
        
        if($resultscount<1)
        {
            $success = false;
        }
        
        $i=0;
        
        while($i<$resultscount)
        {
                $results[$i]['actions']='<div class="text-center"><div class="btn-group btn-group-sm">'.
                                        '<a type="button" href="updateresult?id='.$results[$i]['id'].'"class="btn btn-default btn-update-result" data-id="'.$results[$i]['id'].'">Update</a>'.
                                        '<a type="button" class="btn disabled btn-danger btn-delete-result" data-id="'.$results[$i]['id'].'">Delete</a>'.
                                      '</div></div>';
                $i++;
        }
            
        
        $response = array("success"=>$success,"data"=>$results);
            
        return json_encode($response);
        
        
    }
    
    public function actionGetquestionsfeed($id)
    {
        $questions = \app\models\Question::getTestQuestionsAsArray($id);
        
        $success=true;
        
        $questioncount = count($questions);
        
        if($questioncount<1)
        {
            $success = false;
        }
        
        $i=0;
        
        while($i<$questioncount)
        {
                $questions[$i]['actions']='<div class="text-center"><div class="btn-group btn-group-sm">'.
                                        '<a type="button" href="updatequestion?id='.$questions[$i]['id'].'"class="btn btn-default btn-update-relationship" data-id="'.$questions[$i]['id'].'">Update</a>'.
                                        '<a type="button" class="btn disabled btn-danger btn-delete-relationship" data-id="'.$questions[$i]['id'].'">Delete</a>'.
                                      '</div></div>';
                $i++;
        }
            
        
        $response = array("success"=>$success,"data"=>$questions);
            
        return json_encode($response);
        
        
    }

    
    public function actionPasstest()
    {
        return $this->render('passtest'
            );
    }
    
    public function actionCompletetest()
    {
        $items = $_POST['items'];
        
        $testid = '';
        $userid = '';
        $isValid = true;
        $history = new \app\models\testHistory();
        $answers =[];
        
        if(isset($_POST['testid']))
        {
            $testid = $_POST['testid'];
        }
               
        if(isset($_COOKIE["moodleid"])) 
        {
            $userid = $_COOKIE["moodleid"];
        } 
        
        if(isset($userid) && $userid!='' && isset($testid) && $testid!='')
        {
            $history = \app\models\testHistory::getActiveTest($testid, $userid);
            
            if($history==false)
            {
            
            $history = new \app\models\testHistory();
            $history->test_id = $testid;
            $history->user_id = $userid;
            $history->isactive = 1;
            
            }

            /*print_r($testid);
            die();

            print_r($items);*/
            for($i=0;$i<count($items);$i++)
            {
                $questionid = $items[$i]['id'];
                $requiredanswercount = $items[$i]['requiredanswercount'];
                
                $currentAnswers = $items[$i]['answers'];
                
                $tempAnswers = [];
                
                $nothingSelected = true;
                
                for($y=0;$y<count($currentAnswers);$y++)
                {
                    if($currentAnswers[$y]['result']=='true')
                    {
                        array_push($tempAnswers, $currentAnswers[$y]);
                        //print_r($currentAnswers[$y]);
                        $nothingSelected = false;
                    }
                }
                
                if($requiredanswercount>=count($tempAnswers) && $nothingSelected == false)
                {
                    //create testhistory
                    $answers = array_merge($answers, $tempAnswers);
                }
                else
                {
                    $isValid = false;
                }
                
            }
            
            if($isValid==true)
            {
                //create test history
                $history->isactive = 0;
                $history->save();
                $historyid=$history->getPrimaryKey();
                //bulk insert answers
                \app\models\userAnswer::createUserAnswersBulk($answers, $historyid);
                
                $result = array("success"=>$isValid,"data"=>"");
            }
            else
            {
                $result = array("success"=>$isValid,"data"=>"","error"=>"You did not fill test fields properly");
            }
            
            return json_encode($result);
        }
    }
    
    
}
