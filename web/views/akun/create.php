<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Akun */

$this->title = 'Create Akun';
$this->params['breadcrumbs'][] = ['label' => 'Akuns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="akun-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
