<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class DashboarduserController extends \yii\web\Controller
{
    public $layout = 'user';
    public function actionIndex()
    {
       if (!\Yii::$app->user->isGuest) {
        			
    			return $this->render('index');
    	}
    	else{

    		return $this->redirect('login');
    	}
    }

}