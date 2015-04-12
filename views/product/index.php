<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-outline btn-primary']) ?>
        <?= Html::a('Update Product', ['updatepage'], ['class' => 'btn btn-outline btn-primary']) ?>
        <?= Html::a('Delete Product', ['deletepage'], ['class' => 'btn btn-outline btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_product',
            'kode',
            'nama',
            'package',
            'panjang',
            // 'lebar',
            // 'berat',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
