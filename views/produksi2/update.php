<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Produksi2 */

$this->title = 'Update Produksi2: ' . ' ' . $model->id_produksi_2;
$this->params['breadcrumbs'][] = ['label' => 'Produksi2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_produksi_2, 'url' => ['view', 'id' => $model->id_produksi_2]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="produksi2-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
