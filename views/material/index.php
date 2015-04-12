<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Materials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Material', ['create'], ['class' => 'btn btn-outline btn-primary']) ?>
        <?= Html::a('Update Material', ['updatepage'], ['class' => 'btn btn-outline btn-primary']) ?>
        <?= Html::a('Delete Material', ['deletepage'], ['class' => 'btn btn-outline btn-primary']) ?>

    </p>

      
        <?php
            if(!empty($_GET['nama'])) { 
                echo '<div class="alert alert-success">';
                echo $_GET['nama'];echo ' Successfully Created!'; 
            }
            echo '</div>';
        ?>
   


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_material',
            'kode',
            'nama',
            'tebal',
            'jenis_plat',

           
        ],
    ]); ?>

</div>
