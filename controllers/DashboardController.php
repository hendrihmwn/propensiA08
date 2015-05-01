<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class DashboardController extends \yii\web\Controller
{
    public $layout = 'user';
    public function actionIndex()
    {
       if (!\Yii::$app->user->isGuest) {
        	if(Yii::$app->user->identity->role == 'user'){
        		$layout = 'user';
    			return $this->render('user');
    		}
    		if(Yii::$app->user->identity->role == 'admin'){
    			return $this->render('admin');
    		}
    		if(Yii::$app->user->identity->role == 'supervisor'){
    			return $this->render('supervisor');
    		}
    	}
    	else{

    		return $this->redirect('login');
    	}
    }

}
