<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Import */

$this->title = $model->idImport;
$this->params['breadcrumbs'][] = ['label' => 'Imports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="import-view">
    
    <p>
        <?= Html::a('Create Import', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idImport], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idImport], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idImport',
            'idProduk',
            'stok',
        ],
    ]) ?>

</div>
