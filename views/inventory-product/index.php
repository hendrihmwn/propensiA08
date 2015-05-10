<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventory Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Inventory Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_inventory_product',
            'batas_min',
            'total',
            'id_product',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
