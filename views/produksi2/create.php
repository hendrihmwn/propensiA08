<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Produksi2 */

$this->title = 'Create Produksi2';
$this->params['breadcrumbs'][] = ['label' => 'Produksi2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produksi2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
