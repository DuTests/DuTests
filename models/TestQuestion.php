<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $categoriesID
 * @property string $name
 * @property integer $userid
 * @property string $createdin
 *
 * @property Users $user
 * @property Tests[] $tests
 */
class TestQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'testquestions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['question'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Testquestion ID',
            'testId' => 'Test ID',
            'questionId' => 'Question ID',
        ];
    }

}
