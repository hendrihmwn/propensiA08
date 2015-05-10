<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventory';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-material-index">

    <!-- <h2><?= Html::encode($this->title) ?></h2> -->

    <!-- <p> 
        <?= Html::a('Create Inventory Material', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <h2>Inventory Material</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_inventory_material',
            'batas_min',
            'total',
            'id_material',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]); ?>

    <h2>Inventory Half-Product</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_inventory_product',
            'batas_min',
            'total',
            'id_product',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]); ?>    

    <h2>Inventory Product</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProvider3,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_inventory_product',
            'batas_min',
            'total',
            'id_product',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]); ?>    

</div>
