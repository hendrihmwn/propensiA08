<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AkunSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Akun';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="akun-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Akun', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Reset Password', ['resetpage'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete Akun', ['deletepage'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_akun',
            'username',
            'password',
            'role',
        ],
    ]); ?>

</div>
