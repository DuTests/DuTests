<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_answer".
 *
 * @property integer $id
 * @property integer $test_history_id
 * @property integer $question_id
 * @property integer $answer_id
 *
 * @property TestHistory $testHistory
 * @property Question $question
 * @property Answer $answer
 */
class userAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['test_history_id', 'question_id', 'answer_id'], 'required'],
            [['test_history_id', 'question_id', 'answer_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_history_id' => 'Test History ID',
            'question_id' => 'Question ID',
            'answer_id' => 'Answer ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestHistory()
    {
        return $this->hasOne(TestHistory::className(), ['id' => 'test_history_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswer()
    {
        return $this->hasOne(Answer::className(), ['id' => 'answer_id']);
    }
    
    
    public static function createUserAnswersBulk($answers,$historyid)
    {
        $arraytoInsert = [];
        foreach($answers as $answer)
        {
            if(isset($answer['id']) && $answer['id']!='' && !is_null($answer['id']))
            {
                $answerToInsert = [$historyid,$answer['id'],$answer['question_id']];
                array_push($arraytoInsert, $answerToInsert);
            }
        }

        $query = new \yii\db\Query();

        if(count($arraytoInsert)>0)
        {
            $query->createCommand()->batchInsert('user_answer',['test_history_id','answer_id','question_id'],
                    $arraytoInsert)->execute();
        }
    }
}
