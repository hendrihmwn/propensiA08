<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Product;

/* @var $this yii\web\View */
/* @var $model app\models\Produksi2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produksi2-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_half_product')->dropDownList(
        arrayHelper::map(Product::find()->where(['flag' => 1,'package' => 0])->all(), 'id_product', 'kode'),
        ['prompt'=>'Pilih kode half product']
    ) ?>

    <?= $form->field($model, 'jumlah_half_product')->textInput() ?>

    <?= $form->field($model, 'id_product')->dropDownList(
        arrayHelper::map(Product::find()->where(['flag' => 1,'package' => 1])->all(), 'id_product', 'kode'),
        ['prompt'=>'Pilih kode product']
    ) ?>

    <?= $form->field($model, 'jumlah_terbuat')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
