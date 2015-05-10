<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Produksi1 */

$this->title = 'Update Produksi1: ' . ' ' . $model->id_produksi_1;
$this->params['breadcrumbs'][] = ['label' => 'Produksi1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_produksi_1, 'url' => ['view', 'id' => $model->id_produksi_1]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="produksi1-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
