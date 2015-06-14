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

    public function __construct()
    {
        $this->tests = "Users count: ".Tests::find()->count()."</br>";
        $this->users = "Tests count:".Users::find()->count()."</br>";
        $this->completed = "Passed tests count:".CompletedTest::find()->count()."</br>";
        $this->categories = "Category count:".Category::find()->count()."</br>";
    }
}
