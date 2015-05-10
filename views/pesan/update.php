<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pesan */

$this->title = 'Update Pesan: ' . ' ' . $model->id_pesan;
$this->params['breadcrumbs'][] = ['label' => 'Pesans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pesan, 'url' => ['view', 'id' => $model->id_pesan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pesan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
