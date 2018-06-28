<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Import */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="import-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idProduk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stok')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
