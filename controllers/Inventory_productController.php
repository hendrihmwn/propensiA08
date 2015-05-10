<?php

namespace app\controllers;

use Yii;
use app\models\Inventory_product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Inventory_productController implements the CRUD actions for Inventory_product model.
 */
class Inventory_productController extends Controller
{
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
     * Lists all Inventory_product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Inventory_product::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inventory_product model.
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
     * Creates a new Inventory_product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inventory_product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_inventory_product]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionCreateproduct($id,$nama)
    {
        if(Yii::$app->user->isGuest){
               return $this->redirect(Yii::$app->params['base'].'web');
            } 
        if(Yii::$app->user->identity->role != 'user'){
               return $this->redirect(Yii::$app->params['base'].'web');
            }
        $model = new Inventory_product();
        $model->batas_min = 0;
        $model->total = 0;
        $model->id_product = $id;
        if ($model->save()) {

            
            return $this->redirect(['product/index', 'create' => $nama]);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionCreatehalfproduct($id,$nama)
    {
        if(Yii::$app->user->isGuest){
               return $this->redirect(Yii::$app->params['base'].'web');
            } 
        if(Yii::$app->user->identity->role != 'user'){
               return $this->redirect(Yii::$app->params['base'].'web');
            }
        $model = new Inventory_product();
        $model->batas_min = 0;
        $model->total = 0;
        $model->id_product = $id;
        if ($model->save()) {

            
            return $this->redirect(['halfproduct/index', 'create' => $nama]);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Inventory_product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_inventory_product]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Inventory_product model.
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
     * Finds the Inventory_product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inventory_product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inventory_product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
