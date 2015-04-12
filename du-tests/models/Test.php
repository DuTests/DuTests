<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property integer $id
 * @property string $name
 * @property string $created
 * @property boolean $isactive
 *
 * @property Question[] $questions
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created'], 'safe'],
            [['isactive'], 'boolean'],
            [['name'], 'string', 'max' => 245]
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
            'created' => 'Created',
            'isactive' => 'Is active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['test_id' => 'id']);
    }
    
    public static function getTestsAsArray()
    {
        $obj = Test::find()->asArray()->all();
        
        return $obj;
    }
    
    public static function getTest($id)
    {
        $obj = Test::find()->where('id = :id', ['id'=>$id])->one();
        
        return $obj;
    }
    
    public static function prepareTest($id)
    {
        $obj = Test::find()->with('questions')->asArray()->where('id = :id', ['id'=>$id])->one();
        return $obj;
    }
}
