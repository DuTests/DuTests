<?php

namespace app\models;

use Yii;

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
class Answer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'question_id'], 'required'],
            [['question_id', 'score'], 'integer'],
            [['isvalid'], 'boolean'],
            [['name', 'image'], 'string', 'max' => 245],
            [['description'], 'string', 'max' => 550]
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
            'isvalid' => 'Isvalid',
            'score' => 'Score',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }
    
    public static function getQuestionAnswersAsArray($questionid)
    {
        $obj = Answer::find()->asArray()->where('question_id = :id', ['id'=>$questionid])->all();
        return $obj;
    }
    	
    public static function getAnswer($id)
    {
        $obj = Answer::find()->where('id = :id', ['id'=>$id])->one();
        
        return $obj;
    }
}
