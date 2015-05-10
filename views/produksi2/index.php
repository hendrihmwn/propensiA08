<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Produksi2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengolahan Half Product';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produksi2-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Produksi 2', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [

            'id_produksi_2',
            'waktu',
            'jumlah_half_product',
            'jumlah_terbuat',
            // 'waste',
            // 'id_user',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update} {delete}'],
        ],
    ]); ?>

</div>
