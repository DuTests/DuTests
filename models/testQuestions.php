<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class TestQuestions extends ActiveRecord
{	
	public static function tableName()
	{
		return 'testQuestions';
	}

	public function rules()
	{
		return [
			[['testId', 'questionId'], 'required']
		];
	}


}