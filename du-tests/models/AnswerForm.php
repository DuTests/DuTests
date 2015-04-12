<?php
namespace app\models;

use Yii;
use yii\base\Model;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 /**
 * This is the model class for table "answer".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property integer $question_id
 * @property boolean $isvalid
 * @property integer $score
 *
 * @property Question $question
 */
 
 
 
/**
 * Description of QuestionForm
 *
 * @author user
 */
class AnswerForm extends Model{
    //put your code here

    public $id;
    public $name;
    public $question_id;
    public $description;
    public $image;
    public $isvalid;
	public $score;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'question_id'], 'required'],
            [['question_id','id', 'score'], 'integer'],
			 [['isvalid'], 'boolean'],
            [['name'], 'string', 'max' => 245],
            [['description'], 'string', 'max' => 550],
            ['image', 'file', 'extensions' => ['png','jpg','jpeg','gif']],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
            'question_id' => 'Question ID',
            'isvalid' => 'Is Valid',
			'score' => 'Score'
        ];
    }
    

}
