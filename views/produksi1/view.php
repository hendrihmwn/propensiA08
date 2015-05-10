<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Produksi1 */

$this->title = $model->id_produksi_1;
$this->params['breadcrumbs'][] = ['label' => 'Pengolahan Material', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produksi1-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_produksi_1], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_produksi_1], [
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
            'waktu',
            'jumlah_material',
            'jumlah_terbuat',
            'waste',
            'id_user',
            'flag',
        ],
    ]) ?>

</div>
