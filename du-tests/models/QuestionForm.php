<?php
namespace app\models;

use Yii;
use yii\base\Model;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QuestionForm
 *
 * @author user
 */
class QuestionForm extends Model{
    //put your code here

    public $id;
    public $name;
    public $test_id;
    public $description;
    public $image;
    public $controltype;
    public $requiredanswercount;
    public $controltypes;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'test_id','controltype'], 'required'],
            [['test_id','requiredanswercount','id'], 'integer'],
            [['name'], 'string', 'max' => 245],
            [['description'], 'string', 'max' => 550],
            ['image', 'file', 'extensions' => ['png','jpg','jpeg','gif']],
            [['controltype'], 'string', 'max' => 45],
            [['controltype'], 'validateControltype'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
            'test_id' => 'Test ID',
            'requiredanswercount' => 'Required answer count',
            'controltype' => 'Controltype',
        ];
    }
    
    public function validateControltype()
    {
        if($this->controltype!='radio' && $this->controltype!='checkbox' && $this->controltype!='input')
        {
            $this->addError('controltype', 'Please choose control type');
        }
    }

}
