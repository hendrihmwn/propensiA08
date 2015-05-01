<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Halfproduct */

$this->title = 'Update Halfproduct: ' . ' ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Halfproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id' => $model->nama]];
$this->params['breadcrumbs'][] = 'Update';
?>
	<div class="halfproduct-update body-new">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
