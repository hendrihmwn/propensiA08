<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Supplier */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Suppliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-view body-new">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-pencil"></i> Update', ['update', 'id' => $model->id_supplier], ['class' => 'btn btn-new btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash-o"></i> Delete', ['delete', 'id' => $model->id_supplier], [
            'class' => 'btn btn-dangernew btn-new',
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
            'id_supplier',
            'nama',
            'alamat',
            'contact',
            'flag',
        ],
    ]) ?>

</div>
