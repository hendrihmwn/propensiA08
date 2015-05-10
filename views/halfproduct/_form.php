<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Halfproduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="halfproduct-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode')->textInput(array('maxlength' => 10,'placeholder'=>'kode half product')) ?>

    <?= $form->field($model, 'nama')->textInput(array('maxlength' => 20,'placeholder'=>'nama half product')) ?>

 <!--   <?= $form->field($model, 'package')->textInput() ?>
-->
    <?= $form->field($model, 'panjang')->textInput(array('placeholder'=>'cth: 123.4')) ?>

    <?= $form->field($model, 'lebar')->textInput(array('placeholder'=>'cth: 123.4')) ?>

    <?= $form->field($model, 'berat')->textInput(array('placeholder'=>'cth: 123.4')) ?>

<!--    <?= $form->field($model, 'flag')->textInput() ?>
-->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-plus"></i> Create' : '<i class="fa fa-pencil"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-new btn-success' : 'btn btn-new btn-primary']) ?>
        <?= Html::a('<i class="fa fa-arrow-left"></i> Cancel', ['index'], ['class' => 'btn btn-new btn-warningnew']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>