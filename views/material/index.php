<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaterialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Materials';
$this->params['breadcrumbs'][] = $this->title ;
?>
<div class="material-index body-new">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Create Material', ['create'], ['class' => 'btn btn-success btn-new']) ?>
    </p>

    <?php
            if(!empty($_GET['create'])) { 
                echo '<div class="alert alert-success font-alert">';
                echo 'Material ';echo $_GET['create'];echo ' sukses dibuat!'; ?> <i class="fa fa-check-circle fa-lg"></i> <br><br><a class="btn btn-new btn-success btn-sm" href="<?php echo Yii::$app->params['base']?>web/material"?>OK</a> <?php echo '</div>';

            }
            if(!empty($_GET['update'])) { 
                echo '<div class="alert alert-success font-alert">';
                echo 'Material ';echo $_GET['update'];echo ' sukses diupdate!'; ?> <i class="fa fa-check-circle fa-lg"></i><br><br><a class="btn btn-new btn-success btn-sm" href="<?php echo Yii::$app->params['base']?>web/material"?>OK</a> <?php  echo '</div>';
            }
            if(!empty($_GET['delete'])) { 
                echo '<div class="alert alert-success font-alert">';
                echo 'Material ';echo $_GET['delete']; echo ' sukses dihapus!'; ?> <i class="fa fa-check-circle fa-lg"></i><br><br><a class="btn btn-new btn-success btn-sm" href="<?php echo Yii::$app->params['base']?>web/material"?>OK</a> <?php echo '</div>';
            }
        ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

       //     'id_material',
            'kode',
            'nama',
            'tebal',
            'jenis_plat',
            // 'flag',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update} {delete}'],
        ],
    ]); ?>

</div>
