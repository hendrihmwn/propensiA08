<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Produksi1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengolahan Material';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produksi1-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Produksi 1', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [

            'id_produksi_1',
            'waktu',
            'jumlah_material',
            'jumlah_terbuat',
            'waste',
            // 'id_user',
            // 'flag',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update} {delete}'],
        ],
    ]); ?>

</div>
