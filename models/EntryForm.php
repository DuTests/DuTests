<?php

namespace app\models;

use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;
    public $age;

    public function rules()
    {
        return [
        	['age','safe'],
            [['name', 'email'], 'required'],
            ['email', 'email'],

        ];
    }
}