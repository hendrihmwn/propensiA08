<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Produksi2 */

$this->title = $model->id_produksi_2;
$this->params['breadcrumbs'][] = ['label' => 'Pengolahan Half-Product', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produksi2-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_produksi_2], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_produksi_2], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_produksi_2',
            'waktu',
            'jumlah_half_product',
            'jumlah_terbuat',
            // 'waste',
            // 'id_user',
        ],
    ]) ?>

</div>
