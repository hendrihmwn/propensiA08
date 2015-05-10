<?php

namespace app\controllers;

use Yii;
use app\models\Produksi2;
USE app\models\ProsesProduksi2;
USE app\models\Inventory_product;
use app\models\Produksi2Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Produksi2Controller implements the CRUD actions for Produksi2 model.
 */
class Produksi2Controller extends Controller
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
     * Lists all Produksi2 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Produksi2::find()->select('*')->where(['flag'=>1]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             // 'sort'=> ['defaultOrder' => ['id_material'=>SORT_DESC]]
        ]);

        return $this->render('index', [
            // 'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Produksi2 model.
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
     * Creates a new Produksi2 model.
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

        $model = new Produksi2();
        $model->flag = 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        } else {
            if($model->id_half_product != '' && $model->jumlah_half_product != '' && $model->id_product != '' && $model->jumlah_terbuat != '' && $model->flag == 1)
               {
                   
                   $model->waktu = new Expression('NOW()');
                   
                   $waste = $model->jumlah_half_product - $model->jumlah_terbuat;

                   Yii::$app->db->createCommand()->insert('produksi_2',['waktu'=>$model->waktu, 'jumlah_half_product'=>$model->jumlah_half_product,'jumlah_terbuat'=>$model->jumlah_terbuat,'waste'=>$waste,'id_user'=> Yii::$app->user->identity->id_akun,'flag'=>1])->execute();

                   $model2 = Produksi2::findOne(['waktu'=>$model->waktu, 'id_user'=>Yii::$app->user->identity->id_akun]); 

                   Yii::$app->db->createCommand()->insert('proses_produksi_2',['id_half_product'=>$model['id_half_product'], 'id_produksi_2'=>$model2['id_produksi_2'],'id_product'=>$model['id_product']])->execute();

                   $inventory_hp = Inventory_product::findOne(['id_product'=>$model->id_product]);
                   $hp =  $inventory_hp->total - $model->jumlah_half_product;

                   Yii::$app->db->createCommand()->update('Inventory_product', ['total' => $hp], ['id_product'=>$model->id_half_product] )->execute();
                    
                   $inventory_p = Inventory_product::findOne(['id_product'=>$model->id_product]);
                   $p = $model->jumlah_terbuat + $inventory_p->total;

                   Yii::$app->db->createCommand()->update('Inventory_product', ['total' => $p], ['id_product'=>$model->id_product] )->execute();
                   
                   return $this->redirect(['index']);
               } 
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Produksi2 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_produksi_2]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Produksi2 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
       Yii::$app->db->createCommand()
            ->update('produksi_2', [
                
                'flag' => 0,
            ],['id_produksi_2'=>$id])
            ->execute();

        return $this->redirect(['index', 'delete' => $model->id_produksi_2]);

    }

    /**
     * Finds the Produksi2 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Produksi2 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produksi2::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
