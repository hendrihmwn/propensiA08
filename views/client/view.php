<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Client */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-view body-new">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-pencil"></i> Update', ['update', 'id' => $model->id_client], ['class' => 'btn btn-new btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash-o"></i> Delete', ['delete', 'id' => $model->id_client], [
            'class' => 'btn btn-dangernew btn-new',
            'data' => [
                'onClick' => "return confirm('Are you sure you want to delete this item?')",
                'method' => 'get',
            ],
            'onClick'=> "return confirm('Are you sure you want to delete this item?')",
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_client',
            'no_plant',
            'gate',
            'nama',
            'alamat',
            'contact',
            'flag',
        ],
    ]) ?>

</div>
