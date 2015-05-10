<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inventory_material */

$this->title = 'Update Inventory Material: ' . ' ' . $model->id_inventory_material;
$this->params['breadcrumbs'][] = ['label' => 'Inventory Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_inventory_material, 'url' => ['view', 'id' => $model->id_inventory_material]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventory-material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
