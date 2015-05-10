<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Delete';
$this->params['breadcrumbs'][] = ['label' => 'Suppliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Supplier', ['create'], ['class' => 'btn btn-outline btn-primary']) ?>
        <?= Html::a('Update Supplier', ['updatepage'], ['class' => 'btn btn-outline btn-primary']) ?>
        <?= Html::a('Delete Supplier', ['deletepage'], ['class' => 'btn btn-primary']) ?>

    </p>
    <?php
            if(!empty($_GET['nama'])) { 
                echo '<div class="alert alert-success">';
                echo $_GET['nama'];echo ' Successfully Delete!'; 
            }
            echo '</div>';
        ?>

</div>

<table class='table table-striped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Id</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kontak</th>     
            </tr>
        </thead>
        
        <tbody>
            <?php 
            $i=1;
            
            foreach($data as $row){ ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?= $row->id_supplier ?></td>
                    <td><?= $row->nama ?></td>
                    <td><?= $row->alamat ?></td>
                    <td><?= $row->contact ?></td>
                    <td>
                        
                       
                        <a href="<?php echo Yii::$app->params['base']?>web/supplier/delete?id=<?php echo $row->id_supplier ?>" onClick="return confirm('Are you sure you want to delete?')">
                            <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                        </a>
                      
                    </td>
                </tr>
            <?php 
            $i++;} ?>
        </tbody>
    </table>