<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class CreateTest extends ActiveRecord
{
	public $testName;
	public $startDate;
	public $endDate;
	public $category;
	public $minPercent;
	public $selectQuestions;
	
	public static function tableName()
	{
		return 'tests';
	}

	public function rules()
	{
		return [
			[['testName', 'startDate', 'endDate', 'category', 'minPercent', 'selectQuestions'], 'required'],
			['testName', 'unique'],
			[['testName'], 'string', 'max' => 64],
			[['category'], 'integer', 'max' => 64],
			[['minPercent'], 'integer', 'min' => 0, 'max' => 100],
			[['selectQuestions'], 'integer', 'min' => 0]
		];
	}

		public function attributeLabels()
	{
		return [
			'minPercent' => 'Minimum percent',
			'selectQuestions' => 'How many questions in test will be'
		];
	}
	

	public static function getQuestions($id)
	{
		return Question::find()->asArray()->where(['categoryId' => $id]);
	}

}