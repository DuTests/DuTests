<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class testQuestions extends ActiveRecord
{	
	public static function tableName()
	{
		return 'testquestions';
	}

	public function rules()
	{
		return [
			[['testId', 'questionId'], 'required']
		];
	}


}