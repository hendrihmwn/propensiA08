<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Material;
use app\models\Product;

/* @var $this yii\web\View */
/* @var $model app\models\Produksi1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produksi1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_material')->dropDownList(
        arrayHelper::map(Material::find()->where(['flag' => 1])->all(), 'id_material', 'kode'),
        ['prompt'=>'Pilih kode material']
    ) ?>

    <?= $form->field($model, 'jumlah_material')->textInput() ?>

    <?= $form->field($model, 'id_half_product')->dropDownList(
        arrayHelper::map(Product::find()->where(['flag' => 1,'package' => 0])->all(), 'id_product', 'kode'),
        ['prompt'=>'Pilih kode half product']
    ) ?>
   
    <?= $form->field($model, 'jumlah_terbuat')->textInput() ?>

    <?= $form->field($model, 'waste')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
