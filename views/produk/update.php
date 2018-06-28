<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Produk */

$this->title = 'Update Product: ' . $model->idProduk;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idProduk, 'url' => ['view', 'id' => $model->idProduk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="produk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
