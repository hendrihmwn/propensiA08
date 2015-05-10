<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use app\models\Akun;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Pesan */

$this->title = 'Pesan';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pesan-index body-new">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p> -->
        <!--<?= Html::a('Create Pesan', ['create'], ['class' => 'btn btn-success']) ?> -->
    <!-- </p>  -->

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


    </br>
    <h2>Daftar Pesan</h2>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_pesan',
            'judul',
            'waktu',
            'isi:ntext',
            'id_supervisor',
            'id_user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>