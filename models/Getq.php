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
    public $category;

    public function rules()
    {
        return [
            [['question', 'a1','a2','a3','a4','correct', 'category'], 'required','message'=>'This field cannot be blank!'],
            [['correct'], 'integer', 'max' => 4, 'min' => 1]
        ];
    }
}