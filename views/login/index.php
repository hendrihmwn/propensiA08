<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';
?>
<style>
    .checkbox label {
  padding-left: 33px;
}
body{
  background-image: url("<?= Yii::$app->params['base']?>views/layouts/image/warehouse-blur.jpg");
  background-size: 100%;
}
</style>
<div class="site-login">
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'panel-login col-lg-1 control-label'],
        ],
    ]); ?>

    <div class="body-new font-login">
    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
     <?= $form->field($model, 'rememberMe', [
        'template' => "<div style = \"margin-left:10px;\" class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])->checkbox() ?>
    </div>
    
    </br>
    <div class="form-group">
        <div class=" col-lg-offset-1 col-lg-11center-block">
            <?= Html::submitButton('Login', ['class' => 'btn btn-lg btn-success btn-login btn-new btn-block', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

   
</div>
