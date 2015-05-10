<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reset';
$this->params['breadcrumbs'][] = ['label' => 'Akun', 'url' => ['index']];
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
                echo $_GET['nama'];echo ' successfully updated with new password ';echo $_GET['password'];
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
                        
                       
                        <a href="<?php echo Yii::$app->params['base']?>web/akun/reset?id=<?php echo $row->id_akun ?>&nama=<?php echo $row->username ?>" onClick="return confirm('Are you sure you want to reset the password?')">
                            <span class='glyphicon glyphicon-refresh' aria-hidden='true'></span>
                        </a>
                      
                    </td>
                </tr>
            <?php 
            $i++;} ?>
        </tbody>
    </table>
</div>
