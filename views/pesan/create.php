<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pesan */

$this->title = 'Create Pesan';
$this->params['breadcrumbs'][] = ['label' => 'Pesans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pesan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>