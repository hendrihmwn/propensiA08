<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Akun */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Akuns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="akun-view body-new">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    
        <?= Html::a('<i class="fa fa-trash-o"></i> Delete', ['delete', 'id' => $model->id_akun], [
            'class' => 'btn btn-dangernew btn-danger',
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
            'id_akun',
            'username',
            'password',
            'role',
            'flag',
        ],
    ]) ?>

</div>
