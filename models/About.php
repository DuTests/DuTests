<?php

namespace app\models;

use yii\base\NotSupportedException;
use Yii;
use config\db;
class About extends \yii\db\ActiveRecord 
{
    public $count;

        public function getTests()
        {
            $count = tests::find()->count();
            return $count;
        }

        public function getUsers()
        {
            $count = users::find()->count();
            return $count;
        }

        public function getCompletedtests()
        {
            $count = completedtests::find()->count();
            return $count;
        }
}
