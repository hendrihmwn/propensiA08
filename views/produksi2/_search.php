<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Produksi2Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produksi2-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_produksi_2') ?>

    <?= $form->field($model, 'waktu') ?>

    <?= $form->field($model, 'jumlah_half_product') ?>

    <?= $form->field($model, 'jumlah_terbuat') ?>

    <?= $form->field($model, 'waste') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
