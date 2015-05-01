<?php

namespace app\controllers;

use Yii;
use app\models\Halfproduct;
use app\models\Inventory_product;
use app\models\HalfproductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * HalfproductController implements the CRUD actions for Halfproduct model.
 */
class HalfproductController extends Controller
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
     * Lists all Halfproduct models.
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
        $query = Halfproduct::find()->select('*')
                                ->where(['flag'=>1, 'package'=>0]);
        $dataProvider = new ActiveDataProvider(['query'=>$query,
            'sort'=> ['defaultOrder' => ['id_product'=>SORT_DESC]]]);

        // $searchModel = new HalfproductSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // $queryParams["MaterialSearch"]["flag"] = 1;
        // $queryParams["MaterialSearch"]["package"] = 0;

        return $this->render('index', [
            // 'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Halfproduct model.
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
     * Creates a new Halfproduct model.
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
        $model = new Halfproduct();
        $model->flag = 1;
        $model->package = 0;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             $model2 = new Inventory_product();
            $model2->batas_min = 0;
            $model2->total = 0;
            $model2->id_product = $model->id_product;
            if ($model2->save()){
                return $this->redirect(['index', 'create' => $model->nama]);        
            }
			} else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Halfproduct model.
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
     * Deletes an existing Halfproduct model.
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
            ->update('product', [
                
                'flag' => 0,
            ],['id_product'=>$id])
            ->execute();

        return $this->redirect(['index', 'delete' => $model->nama]);
    }

    /**
     * Finds the Halfproduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Halfproduct the loaded model
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
        if (($model = Halfproduct::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
