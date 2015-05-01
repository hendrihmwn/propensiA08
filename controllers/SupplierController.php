<?php

namespace app\controllers;

use Yii;
use app\models\Supplier;
use app\models\SupplierSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * SupplierController implements the CRUD actions for Supplier model.
 */
class SupplierController extends Controller
{
    public $layout = 'user';
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
     * Lists all Supplier models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
               return $this->redirect(Yii::$app->params['base'].'web');
            } 
        if(Yii::$app->user->identity->role != 'user'){
               return $this->redirect(Yii::$app->params['base'].'web');
            }

        $query = Supplier::find()->select('*')
                               ->where(['flag'=>1]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id_supplier'=>SORT_DESC]]
            ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Supplier model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(Yii::$app->user->isGuest){
               return $this->redirect(Yii::$app->params['base'].'web');
            } 
        if(Yii::$app->user->identity->role != 'user'){
               return $this->redirect(Yii::$app->params['base'].'web');
            }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Supplier model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->isGuest){
               return $this->redirect(Yii::$app->params['base'].'web');
            } 
        if(Yii::$app->user->identity->role != 'user'){
               return $this->redirect(Yii::$app->params['base'].'web');
            }

        $model = new Supplier();
        $model->flag = 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'create' => $model->nama]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Supplier model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->isGuest){
               return $this->redirect(Yii::$app->params['base'].'web');
            } 
        if(Yii::$app->user->identity->role != 'user'){
               return $this->redirect(Yii::$app->params['base'].'web');
            }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'update' => $model->nama]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Supplier model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->isGuest){
               return $this->redirect(Yii::$app->params['base'].'web');
            } 
        if(Yii::$app->user->identity->role != 'user'){
               return $this->redirect(Yii::$app->params['base'].'web');
            }

        $model = $this->findModel($id);
        Yii::$app->db->createCommand()
            ->update('supplier', [
                
                'flag' => 0,
            ],['id_supplier'=>$id])
            ->execute();

        return $this->redirect(['index', 'delete' => $model->nama]);
    }

    /**
     * Finds the Supplier model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Supplier the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(Yii::$app->user->isGuest){
               return $this->redirect(Yii::$app->params['base'].'web');
            } 
        if(Yii::$app->user->identity->role != 'user'){
               return $this->redirect(Yii::$app->params['base'].'web');
            }

        if (($model = Supplier::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
