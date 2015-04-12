<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'package')->textInput() ?>

    <?= $form->field($model, 'panjang')->textInput() ?>

    <?= $form->field($model, 'lebar')->textInput() ?>

    <?= $form->field($model, 'berat')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
