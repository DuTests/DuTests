<?php

namespace app\models;

use Yii;



class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category'], 'string', 'max' => 45],
			[['categoryId'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'categoryId' => 'Category ID',
            'category' => 'Category name',


        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
   // public function getCategories()
  //  {
   //     return $this->hasOne(Categories::className(), ['categoryId' => 'categoryId']);
   // }
  }
