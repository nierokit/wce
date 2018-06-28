<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ImportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Imports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="import-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Import', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idImport',
            'idProduk',
            'stok',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
