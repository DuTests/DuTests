<?php

namespace app\models;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
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
class Feedback extends ActiveRecord 
{
    public $feedbacks;
    
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'comment', 'date'], 'required'],
            [['comment'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'feedbackId' => 'Feedback ID',
            'userId' => 'user ID',
            'date' => 'Date Time',
            'comment' => 'Comment',
        ];
    }
}
