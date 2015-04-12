<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_result".
 *
 * @property integer $id
 * @property integer $test_id
 * @property integer $min_score
 * @property integer $max_score
 * @property string $name
 * @property string $description
 * @property string $created
 * @property boolean $isactive
 *
 * @property Test $test
 */
class testResult extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['test_id','min_score','max_score','name'], 'required'],
            [['test_id', 'min_score', 'max_score'], 'integer'],
            [['created'], 'safe'],
            [['isactive'], 'boolean'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 10000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_id' => 'Test ID',
            'min_score' => 'Minimal Score',
            'max_score' => 'Maximal Score',
            'name' => 'Name',
            'description' => 'Description',
            'created' => 'Created',
            'isactive' => 'Isactive',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTest()
    {
        return $this->hasOne(Test::className(), ['id' => 'test_id']);
    }
    
    public static function getTestResult($id)
    {
        $obj = testResult::find()->where('id = :id', ['id'=>$id])->one();
        
        return $obj;
        
    }
    public static function getTestResultsAsArray($testid)
    {
        $obj = testResult::find()->asArray()->where('test_id = :id', ['id'=>$testid])->all();
        return $obj;
    }
    
    public static function getUserTestResult($testid,$score)
    {
        $obj = testResult::find()->where('test_id=:testid and :score>=min_score and :score<=max_score', ['testid'=>$testid,'score'=>$score])->one();
        return $obj;
    }
    
}
