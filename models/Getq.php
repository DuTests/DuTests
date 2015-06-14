<?php

namespace app\models;

use yii\base\Model;

class Getq extends Model
{
    public $question;
    public $a1;
    public $a2;
    public $a3;
    public $a4;
    public $correct;

    public function rules()
    {
        return [
            [['question', 'a1','a2','a3','a4','correct'], 'required','message'=>'This field cannot be blank!'],

        ];
    }
}