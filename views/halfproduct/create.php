<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Halfproduct */

$this->title = 'Create Halfproduct';
$this->params['breadcrumbs'][] = ['label' => 'Halfproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="halfproduct-create body-new">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
