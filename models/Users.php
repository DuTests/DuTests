<?php

namespace app\models;

use yii\base\NotSupportedException;
use Yii;

class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface //  extends \yii\base\Object
{

    public $authKey;
    public $accessToken;

    public static function findIdentity($id)
    {
        return static::findOne(['UsersID' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username)
    {
        return static::findOne(['Username' => $username]);
    }

    public static function findByEmail($email)
    {
        return static::findOne(['Email' => $email]);
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    
    public function getAuthKey()
    {
        return $this->authKey;
    }  

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->Password);
    }
}
