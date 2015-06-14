<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $name;
    public $surname;
    public $username;
    public $email;
    public $password;
    public $age;

    private $_identity;

    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['name', 'surname', 'username', 'email', 'password','age'], 'required'],
            [['age'], 'integer'],
            [['username', 'email'],'unique'],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password', 'message' => 'Passwords must match'],
            [['name', 'surname', 'username', 'email'], 'string', 'max' => 40],
            [['password'], 'string', 'max' => 70]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'age' => 'Age',
        ];
    }
}

?>