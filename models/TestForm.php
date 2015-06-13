<?php

namespace app\models;

use Yii;
use yii\base\Model;

class TestForm extends Model
{
	public $TestName;
	public $startDate;
	public $endDate;
	public $category;
	public $minPercent;
	public $selectQuestions;

	public function rules()
	{
		return [
			[['TestName', 'startDate', 'endDate', 'category', 'minPercent', 'selectQuestions'], 'required'],
			[['TestName'], 'string', 'max' => 64],
			[['category'], 'string', 'max' => 64],
			[['minPercent'], 'integer', 'max' => 100],
			[['selectQuestions'], 'string', 'max' => 64]
		];
	}
}