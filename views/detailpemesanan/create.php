<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Detailpemesanan */

$this->title = 'Create Order Detail';
$this->params['breadcrumbs'][] = ['label' => 'Order Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detailpemesanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>