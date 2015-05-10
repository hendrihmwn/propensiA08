<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Update';
$this->params['breadcrumbs'][] = ['label' => 'Client', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Client', ['create'], ['class' => 'btn btn-outline btn-primary']) ?>
        <?= Html::a('Update Client', ['updatepage'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete Client', ['deletepage'], ['class' => 'btn btn-outline btn-primary']) ?>

    </p>
     <?php
            if(!empty($_GET['nama'])) { 
                echo '<div class="alert alert-success">';
                echo $_GET['nama'];echo ' Successfully Update!'; 
            }
            echo '</div>';
        ?>
   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_client',
            'no_plant',
            'gate',
            'nama',
            'alamat',
            'contact',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]); ?>
    
</div>
