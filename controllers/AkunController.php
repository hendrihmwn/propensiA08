<?php

namespace app\controllers;

use Yii;
use app\models\Akun;
use app\models\AkunSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * AkunController implements the CRUD actions for Akun model.
 */
class AkunController extends Controller
{
   public $layout = 'admin';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['get'],
                ],
            ],
        ];
    }

    /**
     * Lists all Akun models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
               return $this->redirect(Yii::$app->params['base'].'web');
            } 
        if(Yii::$app->user->identity->role != 'admin'){
               return $this->redirect(Yii::$app->params['base'].'web');
            }

        //$searchModel = new AkunSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //$queryParams = array_merge(array(),Yii::$app->request->getQueryParams());
        //$queryParams["AkunSearch"]["flag"] = 1 ;
       
        //$dataProvider = $searchModel->search($queryParams);

        $query = Akun::find()->select('*')
        -> where(['flag'=>1]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id_akun'=>SORT_DESC]]
            ]);

        return $this->render('index', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Akun model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(Yii::$app->user->isGuest){
               return $this->redirect(Yii::$app->params['base'].'web');
            } 
        if(Yii::$app->user->identity->role != 'admin'){
               return $this->redirect(Yii::$app->params['base'].'web');
            }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Akun model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->isGuest){
               return $this->redirect(Yii::$app->params['base'].'web');
            } 
        if(Yii::$app->user->identity->role != 'admin'){
               return $this->redirect(Yii::$app->params['base'].'web');
            }
        $model = new Akun();
        $model->flag = 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           
        } else {
            if($model->username != '' && $model->password != '' && $model->confirm_password != '' && $model->role != '' && $model->flag == 1 && $model->password == $model->confirm_password)
             {

                if(Akun::find()->where(['username' => $model->username])->one()==null)
                {
                   Yii::$app->db->createCommand()->insert('akun',['username'=>$model->username,'password'=>md5($model->password),'role'=>$model->role,'flag'=>1])->execute();
                   return $this->redirect(['index', 'create' => $model->username]);
                } 
                
           }

             return $this->render('create', [
                'model' => $model,
            ]);
            
        }
        
        
        
    }
    
    public function actionReset($id)
    {
        if(Yii::$app->user->isGuest){
               return $this->redirect(Yii::$app->params['base'].'web');
            } 
        if(Yii::$app->user->identity->role != 'admin'){
               return $this->redirect(Yii::$app->params['base'].'web');
            }
        $model =  $this->findModel($id);
        $newPass = substr(md5(rand()),0,6);
        Yii::$app->db->createCommand()->update('akun',['password'=>md5($newPass)],['id_akun'=>$id])->execute();
        
            return $this->redirect(['index', 'reset' => $model->username, 'password'=>$newPass]);
       
    }
    // public function actionResetpage()
    // {
        
    //     if(Yii::$app->user->isGuest){
    //            return $this->redirect(Yii::$app->params['base'].'web');
    //         } 
    //     if(Yii::$app->user->identity->role != 'admin'){
    //            return $this->redirect(Yii::$app->params['base'].'web');
    //         }
    //     $data = Akun::find()->all();
    //     return $this->render('resetPage', [
    //         // 'dataProvider' => $dataProvider,
    //         'data'=>$data,
    //     ]);
    // }

    /**
     * Updates an existing Akun model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionChangepassword($id)
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
                return $this->redirect(['changepassword', 'id' => $id, 'nama' => 'Old password salah']);
            } 
            if($model->retype_password!=$model->new_password)
            {
                 return $this->redirect(['changepassword', 'id' => $id, 'nama' => 'Retype tidak sama dengan New Password']);
            }
            else{
               $model->password = md5($model->new_password);
              Yii::$app->db->createCommand()->update('akun',['password'=>$model->password],['id_akun'=>$id])->execute();
               return $this->redirect(['changepassword', 'id' => $id, 'update' => $model->username]); 
            }
        }
       
            return $this->render('changepassword', [
                'model' => $model,
            ]);
        
    }

    /**
     * Deletes an existing Akun model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->isGuest){
               return $this->redirect(Yii::$app->params['base'].'web');
            } 
        if(Yii::$app->user->identity->role != 'admin'){
               return $this->redirect(Yii::$app->params['base'].'web');
            }

        $model = $this->findModel($id);
        Yii::$app->db->createCommand()
            ->update('akun', [
                
                'flag' => 0,
            ],['id_akun'=>$id])
            ->execute();

        return $this->redirect(['index','delete' => $model->username]);
    }

    /**
     * Finds the Akun model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Akun the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(Yii::$app->user->isGuest){
               return $this->redirect(Yii::$app->params['base'].'web');
            } 
        if(Yii::$app->user->identity->role != 'admin'){
               return $this->redirect(Yii::$app->params['base'].'web');
            }
        
        if (($model = Akun::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
