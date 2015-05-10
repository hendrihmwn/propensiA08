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

    

</div>
 <table class='table table-striped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Kode</th>
                <th>Nama</th>
       
                <th>Panjang</th>
                <th>Lebar</th>
                <th>Berat</th>
                 <th>Delete</th>
            </tr>
        </thead>
        
        <tbody>
            <?php 
            $i=1;
            
            foreach($data as $row){ ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?= $row->kode ?></td>
                    <td><?= $row->nama ?></td>
                   
                    <td><?= $row->panjang ?></td>
                    <td><?= $row->lebar ?></td>
                    <td><?= $row->berat ?></td>
                    <td>
                        
                       
                        <a href="<?php echo Yii::$app->params['base']?>web/product/delete?id=<?php echo $row->id_product ?>" onClick="return confirm('Are you sure you want to delete?')">
                            <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                        </a>
                      
                    </td>
                </tr>
            <?php 
            $i++;} ?>
        </tbody>
    </table>