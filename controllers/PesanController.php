<?php

namespace app\controllers;

use Yii;
use app\models\Pesan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PesanController implements the CRUD actions for Pesan model.
 */
class PesanController extends Controller
{
    public $layout = 'supervisor';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pesan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Pesan();
        $dataProvider = new ActiveDataProvider([
                         'query' => Pesan::find(),
                    ]);
        if ($model->load(Yii::$app->request->post())) {
            
            Yii::$app->db->createCommand()->insert('pesan',['id_user'=>$model->id_user,'isi'=>$model->isi,'judul'=>$model->judul,'id_supervisor'=>Yii::$app->user->identity->id_akun])->execute();
    
                    return $this->redirect(['index', 'id' => $model->id_pesan]);
        } else {
            return $this->render('index', [
                'dataProvider' => $dataProvider,
            'model' => $model,
            ]);
        }

    }

    /**
     * Displays a single Pesan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pesan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         if(Yii::$app->user->isGuest){
               return $this->redirect(Yii::$app->params['base'].'web');
            } 
        if(Yii::$app->user->identity->role != 'supervisor'){
               return $this->redirect(Yii::$app->params['base'].'web');
            }

        $model = new Pesan();

        if ($model->load(Yii::$app->request->post())) {
            
            Yii::$app->db->createCommand()->insert('pesan',['id_user'=>$model->id_user,'isi'=>$model->isi,'judul'=>$model->judul,'id_supervisor'=>Yii::$app->user->identity->id_akun])->execute();
                   return $this->redirect(['index', 'id' => $model->id_pesan]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pesan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pesan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pesan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pesan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pesan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pesan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
