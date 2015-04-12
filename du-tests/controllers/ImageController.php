<?php

namespace app\controllers;

use Yii;
use app\models\User;
use yii\web\Controller;
class ImageController extends Controller
{

	public function actions()
	{
		return array(
                    'auth' => [
                        'class' => 'yii\authclient\AuthAction',
                        'successCallback' => [$this, 'successCallback'],
                    ],
			'error' => array(
				'class' => 'yii\web\ErrorAction',
			),
		);
	}

        public function behaviors() {
		return array(
			'access' => array(
				'class' => \yii\filters\AccessControl::className(),
				'only' => array('login'),
				'rules' => array(),
			),
			'eauth' => array(
				// required to disable csrf validation on OpenID requests
				'class' => \nodge\eauth\openid\ControllerBehavior::className(),
				'only' => array('login'),
			),
		);
	}
	

        
        
        public function actionShowquestionimage($name=null)
        {
            if($name==false || is_null($name) || !isset($name))
            {
                $name='default.jpg';
            }
            $exists = false;
            $dir = Yii::getAlias('@app/uploads/questions');

            
            $itemPath = $dir.'/'.$name;
            
            $exists = file_exists($itemPath);
            
            if($exists==true)
            {
            $imginfo = getimagesize($itemPath);
            header("Content-type:".$imginfo['mime']);
            readfile($itemPath);
            }
            else
            {
                $itemPath = $dir.'/'.'default.jpg';
                $imginfo = getimagesize($itemPath);
                header("Content-type:".$imginfo['mime']);
                readfile($itemPath);
            }
        }
        
        
         
        public function actionShowanswerimage($name=null)
        {
            if($name==false || is_null($name) || !isset($name))
            {
                $name='default.png';
            }
            $exists = false;
            $dir = Yii::getAlias('@app/uploads/answers');

            
            $itemPath = $dir.'/'.$name;
            
            $exists = file_exists($itemPath);
            
            if($exists==true)
            {
            $imginfo = getimagesize($itemPath);
            header("Content-type:".$imginfo['mime']);
            readfile($itemPath);
            }
            else
            {
                $itemPath = $dir.'/'.'default.png';
                $imginfo = getimagesize($itemPath);
                header("Content-type:".$imginfo['mime']);
                readfile($itemPath);
            }
        }// actionShowquestionimage
        
}
