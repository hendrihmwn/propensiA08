<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\loginForm;
use yii\web\session;

class LoginController extends \yii\web\Controller
{
	public $layout = 'login';
   public function behaviors()
    {
       return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest) {
        	if(Yii::$app->user->identity->role == 'user'){
        		return $this->redirect('dashboarduser');
        	}
        	if(Yii::$app->user->identity->role == 'admin'){
        		return $this->redirect('dashboardadmin');
        	}
        	if(Yii::$app->user->identity->role == 'supervisor'){
        		return $this->redirect('dashboardsupervisor');
        	}
            
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
   
}
