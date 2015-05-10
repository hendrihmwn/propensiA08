<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Delete';
$this->params['breadcrumbs'][] = ['label' => 'Akun', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="akun-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Akun', ['create'], ['class' => 'btn btn-outline btn-primary']) ?>
        <?= Html::a('Reset Password', ['resetpage'], ['class' => 'btn btn-outline btn-primary']) ?>
        <?= Html::a('Delete Akun', ['deletepage'], ['class' => 'btn btn-primary']) ?>

    </p>
    <?php
            if(!empty($_GET['nama'])) { 
                echo '<div class="alert alert-success">';
                echo $_GET['nama'];echo ' successfully deleted!'; 
            }
            echo '</div>';
        ?>

    <table class='table table-striped'>
        <thead>
            <tr>
                <th>#</th>
                <th>ID Akun</th>
                <th>Username</th>
                <th>Role</th>
                <th>Delete</th>
            </tr>
        </thead>
        
        <tbody>
            <?php 
            $i=1;
            
            foreach($data as $row){ ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?= $row->id_akun ?></td>
                    <td><?= $row->username ?></td>
                    <td><?= $row->role ?></td>
                    <td>
                        
                       
                        <a href="<?php echo Yii::$app->params['base']?>web/akun/delete?id=<?php echo $row->id_akun ?>" onClick="return confirm('Are you sure you want to delete?')">
                            <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                        </a>
                      
                    </td>
                </tr>
            <?php 
            $i++;} ?>
        </tbody>
    </table>
</div>
