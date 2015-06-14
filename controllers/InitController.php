<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

use app\models\Users;
use app\models\Category;
use app\models\Tests;
use app\models\Question;
use app\models\Answer;
use app\models\CompletedTest;
use app\models\Feedback;

	class InitController extends Controller
	{
		
		public function actionIndex()
		{
            /* --- DELETE IN ALL TABLES --- */
            $users = Users::find()->all();
            foreach($users as $u)
                $u->delete();
                
            $cats = Category::find()->all();
            foreach($cats as $c)
                $c->delete();
                
            $tests = Tests::find()->all();
            foreach($tests as $t)
                $t->delete();
                
            $questions = Question::find()->all();
            foreach($questions as $q)
                $q->delete();
                
            $answers = Answer::find()->all();
            foreach($answers as $a)
                $a->delete();
                
            $compt = CompletedTest::find()->all();
            foreach($compt as $c)
                $c->delete();
                
            $fb = Feedback::find()->all();
            foreach($fb as $f)
                $f->delete();
            /* --- DELETE IN ALL TABLES --- */
    
            /* --- Users --- */
            $users = array();
                
            $user_num = rand(5, 5);            
            for($i = 1; $i <= $user_num; $i++)
            {
                $users[$i] = new Users;
                $users[$i] = $this->generate_user(); // generate random user
                $users[$i]->save();
            }
            
            
            /* --- Category --- */
            $cats = array();
            
            $cats_num = rand(5, 5);
            for($i = 1; $i <= $cats_num; $i++)
            {
                $cats[$i] = new Category;
                $cats[$i]->save();
                $cats[$i]->category = "Kategorija_{$cats[$i]->categoryId}";
                $cats[$i]->save();
            }
            
            /* --- Tests --- */
            $tests = array ();
                
            $tests_num = rand(5, 5);
            for($i = 1; $i <= $tests_num; $i++)
            {
                $tests[$i] = new Tests;
                $tests[$i]->save();
                $tests[$i]->testName = "Test_{$tests[$i]->testId}";
                $tests[$i]->categoryId = $cats[rand(1, $cats_num)]->categoryId;
                $tests[$i]->categoryName = "Kategorija_{$cats[$i]->categoryId}";
                
                $dateStart = time();
                $dateEnd = $dateStart + 3600 * 24 * 7;
                
                $tests[$i]->startDate = date('y.m.d', $dateStart);
                $tests[$i]->endDate = date('y.m.d', $dateEnd);
                
                $tests[$i]->save();
                
                
            }   
            
            /* --- Questions --- */
            $num = array ();
            $question = array ();
            $questions_num = 3;
            
            $i = 0; // number of question in foreach
            foreach($tests as $t) // for each test ->3 questions
            {
                for($j = 0; $j < $questions_num; $j++)
                {       
                    $question[$i] = new Question;
                    $question[$i]->save();
                        
                    $num[$i]['a'] = rand(1,10); // a
                    $num[$i]['b'] = rand(1,10); // b
                        
                    $question[$i]->question = "Number of {$num[$i]['a']} + {$num[$i]['b']} = ?"; // question a + b ?
                    $question[$i]->testId = $t->testId;
                    
                    $question[$i]->save();
                    
                    $i++;
                }
            }
            
            /* --- Answers --- */
            $answers = array ();
            $answers_num = 3;
            
            $i = 0; // question number
            foreach($question as $q) // for each question 3 answers
            {
                $values = array ();
                $correct_answer = $num[$i]['a'] + $num[$i]['b'];
                $values[0] = $correct_answer;
                for($j = 1; $j < $answers_num; $j++) // wrong answer generator
                    $values[$j] = $correct_answer + rand(1,0) == 1 ? rand(1, 10) : rand(1, 10) * -1;
                    
                $k = 0; // number of answers
                for($j = 0; $j < $answers_num; $j++)
                {
                    $answers[$k] = new Answer;
                    $answers[$k]->questionId = $q->questionId;
                    $answers[$k]->answer = $values[$j];
                    $answers[$k]->save();
                        
                    $question[$i]->correctAnswerId = $answers[0]->answerId; // add correct answer id to questions
                    $question[$i]->save();
                    $k++;
                }
                $i++;
            }         
            
            /* --- Completed Tests --- */
            $compt = array ();
            $i = 0;
            foreach($tests as $t)
            {
                $compt[$i] = new CompletedTest;
                $compt[$i]->date = date('y.m.d', time()+300);
                $compt[$i]->correctAnswerCount = rand(0, $answers_num);
                $compt[$i]->testId = $t->testId;
                $compt[$i]->userId = $users[rand(1, $user_num)]->userId;
                $compt[$i]->save();
            }
            $i++;
            
            /* --- Feed Back --- */
            $fb = array();
            $i = 0;
            foreach($users as $u)
            {
                $fb[$i] = new Feedback;
                $fb[$i]->userId = $u->userId;
                $fb[$i]->date = date('y.m.d');
                $fb[$i]->comment = "Hi, my name is {$u->firstName} {$u->lastName} and my registration date is {$u->registrationDate}!";
                $fb[$i]->save();
            }
            $i++;
		}
        
        public function generate_user()
        {
            $user = new Users;
            $names = array();
            $names[1] = array('Artyom', 'Dainis', 'Janis', 'Maris', 'Edgars', 'Arturs', 'Matiss', 'Raimonds', 'Vadims', 'Arvils', 'Haralds');
            $names[0] = array('Laura', 'Violeta', 'Diana', 'Viktorija', 'Anastasija', 'Alina', 'Vija', 'Ieva'); 
            $names2 = array('Liepa', 'Egle', 'Klints', 'Ledus', 'Cinkus', 'Alus', 'Dzelzs', 'Grunts');
            
            $user->gender = rand(1,0);
            $user->firstName = $names[$user->gender][array_rand($names[$user->gender])];
            $user->lastName = $names2[array_rand($names2)];
            $user->registrationDate = date("y.m.d");
            $user->username = $user->firstName.'_'.rand(1,100);
            $user->age = rand(7,99);
            $user->email = "{$user->username}@email.com";
            $user->password = Yii::$app->security->generatePasswordHash("qwerty");
            
            return $user;
        }
        
	}
?>