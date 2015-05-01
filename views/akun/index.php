<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AkunSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Akuns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-new akun-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Create Akun', ['create'], ['class' => 'btn btn-new btn-success']) ?>
    </p>

     <?php
            if(!empty($_GET['create'])) { 
                echo '<div class="alert alert-success font-alert">';
                echo 'Akun '; echo $_GET['create'];echo ' sukses dibuat!'; ?> <i class="fa fa-check-circle fa-lg"></i><br><br><a class="btn btn-new btn-success btn-sm" href="<?php echo Yii::$app->params['base']?>web/akun"?>OK</a> <?php echo '</div>'; 
            }
            echo '</div>';


            if(!empty($_GET['delete'])) { 
                echo '<div class="alert alert-success font-alert">';
                echo 'Akun '; echo $_GET['delete'];echo ' Sukses dihapus!'; ?><i class="fa fa-check-circle fa-lg"></i><br><br><a class="btn btn-new btn-success btn-sm" href="<?php echo Yii::$app->params['base']?>web/akun"?>OK</a> <?php echo '</div>'; 
            }
            echo '</div>';

            if(!empty($_GET['reset'])) { 
                echo '<div class="alert alert-success font-alert">';
                echo 'Password akun '; echo $_GET['reset'];echo ' berhasil diganti menjadi ';echo $_GET['password']; ?> <i class="fa fa-check-circle fa-lg"></i><br><br><a class="btn btn-new btn-success btn-sm" href="<?php echo Yii::$app->params['base']?>web/akun"?>OK</a> <?php echo '</div>';
            }
            echo '</div>';

    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //    'id_akun',
            'username', 
            'role',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {delete} {reset}'],
            
        ],
    ]); ?>

</div>
