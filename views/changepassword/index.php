<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Akun */

$this->title = 'Change Password: ' . ' ' . $model->username;
$this->params['breadcrumbs'][] = 'Change Password';
?>
<div class="body-new akun-update">
    <h1><?= Html::encode($this->title) ?></h1>
<?php
    if(!empty($_GET['nama'])) { 
                echo '<div class="alert alert-danger font-alert">';
                echo $_GET['nama'];echo '</div>';

            }
        if(!empty($_GET['update'])) { 
                echo '<div class="alert alert-success">';
                echo 'Password username '; echo $_GET['update'];echo ' berhasil disimpan</div>';
            }

                
        ?>
    <?= $this->render('_formChange', [
        'model' => $model,
    ]) ?>

</div>