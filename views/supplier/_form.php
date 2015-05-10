<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Supplier */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supplier-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(array('placeholder' => 'Nama Perusahaan','maxlength' => 30)) ?>

    <?= $form->field($model, 'alamat')->textArea(array('placeholder' => 'Alamat Perusahaan','maxlength' => 50,'rows' => '4')) ?>

    <?= $form->field($model, 'contact')->textInput(array('placeholder' => 'No. Telp. Perusahaan (cth: 021-8788888)','maxlength' => 50)) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-plus"></i> Create' : '<i class="fa fa-pencil"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-new btn-success' : 'btn btn-new btn-primary']) ?>
        <?= Html::a('<i class="fa fa-arrow-left"></i> Cancel', ['index'], ['class' => 'btn btn-new btn-warningnew']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
