<?php

namespace app\controllers;
use Yii;
use app\models\Akun;
use app\models\AkunSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

class ChangepasswordController extends \yii\web\Controller
{
    public $layout = 'user';
    public function actionIndex($id)
    {
        if(Yii::$app->user->isGuest){
               return $this->redirect(Yii::$app->params['base'].'web');
            } 
            if(Yii::$app->user->identity->id_akun != $id){
               return $this->redirect(Yii::$app->params['base'].'web');
            }
        
        $model = $this->findModel($id);
        if($model->load(Yii::$app->request->post())){

        
	        if($model->password != md5($model->old_password)){
	            return $this->redirect(['index', 'id' => $id, 'nama' => 'Old password salah']);
	        } 
	       if($model->retype_password!=$model->new_password)
	        {
	             return $this->redirect(['index', 'id' => $id, 'nama' => 'Retype tidak sama dengan New Password']);
	        }
	        else{
	            $model->password = md5($model->new_password);
	          Yii::$app->db->createCommand()->update('akun',['password'=>$model->password],['id_akun'=>$id])->execute();

	           return $this->redirect(['index', 'id' => $id, 'update' => $model->username]); 
	        }
	    }
       
            return $this->render('index', [
                'model' => $model,
            ]);
        
        }
    protected function findModel($id)
    {
        if(Yii::$app->user->isGuest){
               return $this->redirect(Yii::$app->params['base'].'web');
            } 
        
        if (($model = Akun::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
