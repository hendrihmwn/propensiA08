<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inventory_product */

$this->title = 'Update Inventory Product: ' . ' ' . $model->id_inventory_product;
$this->params['breadcrumbs'][] = ['label' => 'Inventory Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_inventory_product, 'url' => ['view', 'id' => $model->id_inventory_product]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventory-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
