<?php

namespace app\models;

use yii\base\NotSupportedException;
use Yii;
use config\db;

class About extends \yii\db\ActiveRecord 
{
    public $tests;
    public $users;
    public $completed;
    public $categories;
    public $questions;

    public function __construct()
    {
        $this->tests = "<p>Users count: ".Tests::find()->count()."</p></br>";
        $this->users = "<p>Tests count: ".Users::find()->count()."</p></br>";
        $this->completed = "<p>Passed tests count: ".CompletedTest::find()->count()."</p></br>";
        $this->categories = "<p>Categories count: ".Category::find()->count()."</p></br>";
        $this->questions = "<p>Questions count: ".Question::find()->count()."</p></br>";
    }
}
