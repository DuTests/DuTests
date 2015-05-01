<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $nickname
 * @property string $email
 * @property string $password
 * @property integer $age
 */
class Users extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['name', 'surname', 'nickname', 'email', 'password', 'age'], 'required'],
            [['age'], 'integer'],
            [['name', 'surname', 'nickname', 'email'], 'string', 'max' => 40],
            [['password'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'nickname' => 'Nickname',
            'email' => 'Email',
            'password' => 'Password',
            'age' => 'Age',
        ];
    }
}
