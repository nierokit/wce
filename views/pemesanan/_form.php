<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\web\JsExpression;
use yii\jui\AutoComplete;
use app\models\Pelanggan;
use app\models\Detailpemesanan;
use yii\helpers\Url;
use mdm\widgets\TabularInput;

/* @var $this yii\web\View */
/* @var $model app\models\Pemesanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemesanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'idPelanggan')->widget(AutoComplete::classname(), [
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'source' => new JsExpression("function(request, response){
                    $.getJSON('" . Url::toRoute(['pemesanan/get-pelanggan']) . "',{
                    term : request.term,
                    },response);
                }"),
        ],
    ]) ?>

    <?= $form->field($model, 'tanggalPesan')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter Order date ...'],
    'pluginOptions' => [
        'format'=>'yyyy-mm-dd',
        'autoclose'=>true
    ]
]) ?>

    <?= $form->field($model, 'tanggalKirim')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter Shipping date ...'],
    'pluginOptions' => [
        'format'=>'yyyy-mm-dd',
        'autoclose'=>true
    ]
]) ?>

    <?=
    	$form->field($model, 'status')->dropDownList($statusList = ([
        'On Progress' => 'On Progress',
        'Shipped' => 'Shipped',
        'Canceled' => 'Canceled'
            ]), ['prompt' => '- Status Select -']);
    ?>
    
    <h3>Detail Item</h3>
<hr/>
<div class="row">
    <div class="col-md-4">
        <?php
        echo AutoComplete::widget([
            'name' => 'produk',
            'options' => ['class' => 'form-control'],
            'clientOptions' => [
                'source' => new JsExpression("function(request, response){
                    $.getJSON('" . Url::toRoute(['pemesanan/get-produk']) . "',{
                    term : request.term,
                    },response);
                }"),
                'select' => new JsExpression("function(event, ui){                    
                    $('#btn-tambah').click();
                    var maxid = 0;
                    $('.mdm-item').each(function(){
                    var value = parseFloat($(this).attr('data-key'));
                    maxid = (value > maxid) ? value : maxid;
                    });
                    
                    var drow = $('tr[data-key=' + maxid + ']');
                    drow.find('#idProduk').html(ui.item.id);
                    drow.find('#namaProduk').html(ui.item['name']);
                    drow.find('#jumlahPemesanan').html(1);
                    drow.find('#harga').html(ui.item['price']);
                    
                    drow.find('#oidProduk').val(ui.item.id);
                    drow.find('#ojumlahPemesanan').val(1);
                    drow.find('#oharga').val(ui.item['price']);
                    }"),
            ],
        ]);
        ?>

    </div><br/><br/>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-bordered table-striped">
            <thead style="background-color: #d2d6de">
                <tr>
                    <th>PRODUCT CODE</th>
                    <th>PRODUCT NAME</th>
                    <th>QTY</th>
                    <th>PRICE</th>
                    <th><a id="btn-tambah" class="btn btn-sm"><span class="glyphicon glyphicon-plus">tambah</span></a></th>
                </tr>
            </thead>
<?=
TabularInput::widget([
    'id' => 'detail-grid',
    'allModels' => $model->detailpemesanans,
    'model' => Detailpemesanan::className(),
    'tag' => 'tbody',
    'itemOptions' => ['tag' => 'tr'],
    'itemView' => '_item_detail',
    'clientOptions' => [
    'btnAddSelector' => '#btn-tambah'
    ]
]);
?>
        </table>
    </div>
</div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
