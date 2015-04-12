<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Delete';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-outline btn-primary']) ?>
        <?= Html::a('Update Product', ['updatepage'], ['class' => 'btn btn-outline btn-primary']) ?>
        <?= Html::a('Delete Product', ['deletepage'], ['class' => 'btn btn-primary']) ?>

    </p>
    <?php
            if(!empty($_GET['nama'])) { 
                echo '<div class="alert alert-success">';
                echo $_GET['nama'];echo ' Successfully Delete!'; 
            }
            echo '</div>';
        ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_product',
            'kode',
            'nama',
            'tebal',
            'jenis_plat',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{delete}'],
        ],
    ]); ?>

</div>
