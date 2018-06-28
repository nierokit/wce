<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pelanggan */

$this->title = 'Update Customer: ' . $model->idPelanggan;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPelanggan, 'url' => ['view', 'id' => $model->idPelanggan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pelanggan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
