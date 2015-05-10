<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view body-new">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-pencil"></i> Update', ['update', 'id' => $model->id_product], ['class' => 'btn btn-new btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash-o"></i> Delete', ['delete', 'id' => $model->id_product], [
            'class' => 'btn btn-dangernew btn-danger',
            'data' => [
                'onClick' => "return confirm('Are you sure you want to delete this item?')",
                'method' => 'get',
            ],
            'onClick' => "return confirm('Are you sure you want to delete this item?')",
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_product',
            'kode',
            'nama',
            'package',
            'panjang',
            'lebar',
            'berat',
            'flag',
        ],
    ]) ?>

</div>
