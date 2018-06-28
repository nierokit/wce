<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Import */

$this->title = 'Update Import: ' . $model->idImport;
$this->params['breadcrumbs'][] = ['label' => 'Imports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idImport, 'url' => ['view', 'id' => $model->idImport]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="import-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
