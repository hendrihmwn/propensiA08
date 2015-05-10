<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Akun */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="body-new akun-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'old_password')->passwordInput(array('placeholder' => 'Password Lama','maxlength' => 255)) ?>

    <?= $form->field($model, 'new_password')->passwordInput(array('placeholder' => 'Password Baru','maxlength' => 255)) ?>

    <?= $form->field($model, 'retype_password')->passwordInput(array('placeholder' => 'Ketik ulang Password Baru','maxlength' => 255)) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-plus"></i> Create' : '<i class="fa fa-pencil"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-new btn-success' : 'btn btn-new btn-primary']) ?>
    	<?= Html::a('<i class="fa fa-arrow-left"></i> Cancel', ['../web'], ['class' => 'btn btn-new btn-warningnew']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>