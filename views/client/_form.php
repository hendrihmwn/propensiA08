<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_plant')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'gate')->textInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'contact')->textInput(['maxlength' => 50]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>