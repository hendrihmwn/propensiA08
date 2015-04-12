<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reset';
$this->params['breadcrumbs'][] = ['label' => 'Akuns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="akun-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Akun', ['create'], ['class' => 'btn btn-outline btn-primary']) ?>
        <?= Html::a('Reset Password', ['resetpage'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete Akun', ['deletepage'], ['class' => 'btn btn-outline btn-primary']) ?>

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

            'id_akun',
            'username',
            'password',
            'role',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]); ?>

</div>
