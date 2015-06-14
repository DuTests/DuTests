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
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            //[['category'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'feedbackID' => 'Categories ID',
            'userId' => 'user ID',
            'date_time' => 'Date Time',
            'comment' => 'Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['UsersID' => 'userid']);
    }
}
