<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Produksi1 */

$this->title = 'Create Produksi1';
$this->params['breadcrumbs'][] = ['label' => 'Produksi1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produksi1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
