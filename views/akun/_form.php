<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Akun */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="akun-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(array('placeholder' => 'Username (ex: user001/supervisor001/admin001)','maxlength' => 30)) ?>

    <?= $form->field($model, 'password')->passwordInput(array('placeholder' => 'Password (sebaiknya terdiri dari huruf dan angka)','maxlength' => 255)) ?>
    <?= $form->field($model, 'confirm_password')->passwordInput(array('placeholder' => 'Ketik ulang Password','maxlength' => 255)) ?>

    <?= $form->field($model, 'role')->dropDownList(['' => '--select--', 'admin'=>'Admin', 'supervisor' => 'Supervisor', 'user' => 'User']) ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-plus"></i> Create' : '<i class="fa fa-pencil"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-new btn-success' : 'btn btn-new btn-primary']) ?>
    	<?= Html::a('<i class="fa fa-arrow-left"></i> Cancel', ['index'], ['class' => 'btn btn-warningnew btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
