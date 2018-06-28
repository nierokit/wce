<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Detailpemesanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detailpemesanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPemesanan')->textInput() ?>

    <?= $form->field($model, 'idProduk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlahPemesanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
