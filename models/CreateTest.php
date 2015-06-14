<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class CreateTest extends ActiveRecord
{
	public $TestName;
	public $startDate;
	public $endDate;
	public $category;
	public $minPercent;
	public $selectQuestions;
	
	public static function tableName()
	{
		return 'categories';
	}

	public function rules()
	{
		return [
			[['testName', 'startDate', 'endDate', 'category', 'minPercent', 'selectQuestions'], 'required', 'unique'],
			[['testName'], 'string', 'max' => 64],
			[['endDate'], 'compare', 'compareAttribute' => 'startDate', 'operator'=>'>', 'message'=>'Start Date must be less than End Date'],
			[['category'], 'string', 'max' => 64],
			[['minPercent'], 'integer', 'min' => 0, 'max' => 100],
			[['selectQuestions'], 'integer', 'min' => 0]
		];
	}
}