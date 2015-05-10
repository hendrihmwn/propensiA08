<?php

namespace app\controllers;

use Yii;
use app\models\Produksi1;
use app\models\Material;
use app\models\Product;
use app\models\Inventory_material;
use app\models\Inventory_product;
use app\models\Produksi1Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ProsesProduksi1;
use yii\data\ActiveDataProvider;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * Produksi1Controller implements the CRUD actions for Produksi1 model.
 */
class Produksi1Controller extends Controller
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
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'time_created',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * Lists all Produksi1 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Produksi1::find()->select('*')->where(['flag'=>1]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             // 'sort'=> ['defaultOrder' => ['id_material'=>SORT_DESC]]
        ]);


        // $searchModel = new Produksi1Search();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Produksi1 model.
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
     * Creates a new Produksi1 model.
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

        $model = new Produksi1();
        $model->flag = 1;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        } else {
            if($model->id_material != '' && $model->jumlah_material != '' && $model->id_half_product != '' && $model->jumlah_terbuat != '' && $model->flag == 1 && $model->waste != '')
               {

                   $model->waktu = new Expression('NOW()');
                   
                   Yii::$app->db->createCommand()->insert('produksi_1',['waktu'=>$model->waktu, 'jumlah_material'=>$model->jumlah_material,'jumlah_terbuat'=>$model->jumlah_terbuat,'waste'=>$model->waste,'id_user'=> Yii::$app->user->identity->id_akun,'flag'=>1])->execute();

                   $model2 = Produksi1::findOne(['waktu'=>$model->waktu, 'id_user'=>Yii::$app->user->identity->id_akun]);
                   // $material = Material::findOne(['id_material'=>$model->id_material]);
                   // $half_product = Product::findOne(['id_product'=>$model->id_half_product, 'package'=>'0']); 

                   Yii::$app->db->createCommand()->insert('proses_produksi_1',['id_material'=>$model['id_material'], 'id_produksi_1'=>$model2['id_produksi_1'],'id_product'=>$model['id_half_product']])->execute();

                   $inventory_mat = Inventory_material::findOne(['id_material'=>$model->id_material]);
                   $mat =  $inventory_mat->total - $model->jumlah_material;

                   Yii::$app->db->createCommand()->update('inventory_material', ['total' => $mat], ['id_material'=>$model->id_material] )->execute();
                    
                   $inventory_hp = Inventory_product::findOne(['id_product'=>$model->id_half_product]);
                   $hp = $model->jumlah_terbuat + $inventory_hp->total;

                   Yii::$app->db->createCommand()->update('Inventory_product', ['total' => $hp], ['id_product'=>$model->id_half_product] )->execute();

                   return $this->redirect(['index']);
               } 
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Produksi1 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {


    }

    /**
     * Deletes an existing Produksi1 model.
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
            ->update('produksi_1', [
                
                'flag' => 0,
            ],['id_produksi_1'=>$id])
            ->execute();

        return $this->redirect(['index', 'delete' => $model->id_produksi_1]);

    }

    /**
     * Finds the Produksi1 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Produksi1 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produksi1::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
