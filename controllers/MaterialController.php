<?php

namespace app\controllers;

use Yii;
use app\models\Material;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialController implements the CRUD actions for Material model.
 */
class MaterialController extends Controller
{
    public $layout = "user";
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
     * Lists all Material models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $dataProvider = new ActiveDataProvider([
            'query' => Material::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionUpdatepage()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Material::find(),
        ]);

        return $this->render('updatePage', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionDeletepage()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Material::find(),
        ]);

        return $this->render('deletePage', [
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Material model.
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
     * Creates a new Material model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Material();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id_material, 'nama' => $model->nama]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Material model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['updatepage', 'id' => $model->id_material,'nama' => $model->nama]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Material model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['deletepage','nama' => $id]);
    }

    /**
     * Finds the Material model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Material the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Material::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
