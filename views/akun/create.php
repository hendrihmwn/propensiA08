<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Akun */

$this->title = 'Create Akun';
$this->params['breadcrumbs'][] = ['label' => 'Akuns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="akun-create body-new">

    <h1><?= Html::encode($this->title) ?></h1>
<?php
    if(!empty($_GET['false'])) { 
                echo '<div class="alert alert-danger">';
                echo 'Password dengan Retype Password Tidak Sama';echo '</div>';

            }
                      
        ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


</div>
