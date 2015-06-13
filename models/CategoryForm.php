<?php

namespace app\models;

use Yii;
use yii\base\Model;


class CategoryForm extends Model
{
    public $name;
    public $createdby;
    public $createdin;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            ['createdby', 'integer'],
            ['createdin', 'safe']
        ];
    }

}
