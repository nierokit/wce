<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pemesanan */

$this->title = 'Update Order: ' . $model->idPemesanan;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPemesanan, 'url' => ['view', 'id' => $model->idPemesanan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pemesanan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
