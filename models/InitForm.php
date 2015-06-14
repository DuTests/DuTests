<?php

namespace app\models;

use Yii;
use yii\base\Model;


class InitForm extends Model
{
    public $records_num;
    public $records_del;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['records_num', 'integer', 'min'=>0, 'max'=>100],
            ['records_del', 'string'],
        ];
    }

}
