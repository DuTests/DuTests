<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property integer $test_id
 * @property integer $requiredanswercount
 * @property string $controltype
 *
 * @property Answer[] $answers
 * @property Test $test
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'test_id'], 'required'],
            [['test_id', 'requiredanswercount'], 'integer'],
            [['name', 'image'], 'string', 'max' => 245],
            [['description'], 'string', 'max' => 550],
            [['controltype'], 'string', 'max' => 45]
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
            'test_id' => 'Test ID',
            'requiredanswercount' => 'Requiredanswercount',
            'controltype' => 'Controltype',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::className(), ['question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTest()
    {
        return $this->hasOne(Test::className(), ['id' => 'test_id']);
    }
    public static function getTestQuestionsAsArray($testid)
    {
        $obj = Question::find()->asArray()->where('test_id = :id', ['id'=>$testid])->all();
        return $obj;
    }
    
    public static function getControlTypes()
    {
        $obj = array('radio'=>'radio','checkbox'=>'checkbox','input'=>'input');
        return $obj;
    }
    public static function getQuestion($id)
    {
        $obj = Question::find()->where('id = :id', ['id'=>$id])->one();
        
        return $obj;
    }

}
