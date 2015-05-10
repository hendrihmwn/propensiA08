<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class DashboardadminController extends \yii\web\Controller
{
    public $layout = 'admin';
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