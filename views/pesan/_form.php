<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Akun;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Pesan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pesan-form">

    <?php $form = ActiveForm::begin(); ?>

        <div class="col-lg-3">
        <?= $form->field($model, 'id_user')->dropDownList(
            arrayHelper::map(Akun::find()->where(['flag'=>1, 'role'=> 'user'])->all(), 'id_akun', 'username'),
            ['prompt'=> 'Pilih User']
        ) ?>
        </div>
        </br>
        <!-- <?= $form->field($model, 'id_user')->textInput() ?> -->
        <?= $form->field($model, 'judul')->textInput(['maxlength' => 30]) ?>
        <?= $form->field($model, 'waktu')->textInput() ?>
        <?= $form->field($model, 'isi')->textarea(['rows' => 6]) ?>
        <!-- <?= $form->field($model, 'id_supervisor')->textInput() ?> -->

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

</div>
