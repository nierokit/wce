<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jenisproduk */

$this->title = 'Update Product Type: ' . $model->idJenisProduk;
$this->params['breadcrumbs'][] = ['label' => 'Product Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idJenisProduk, 'url' => ['view', 'id' => $model->idJenisProduk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenisproduk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
