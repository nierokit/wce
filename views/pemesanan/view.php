<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Pelanggan;
use app\models\Pemesanan;
use app\models\Produk;
use app\models\Detailpemesanan;

/* @var $this yii\web\View */
/* @var $model app\models\Pemesanan */

$this->title = $model->idPemesanan;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-view">

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idPemesanan], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->idPemesanan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idPemesanan',
            'pelanggan.namaPelanggan',
            'tanggalPesan',
            'tanggalKirim',
            'status',
            'JumlahItem'
        ],
    ])
    ?>     
    <div class="col-md-8, table table-hover">
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>NOMOR</th>
                    <th>PRODUCT CODE</th>
                    <th>PRODUCT NAME</th>
                    <th>QTY</th>
                    <th>PRICE</th>
                </tr>
            </thead>
            <?php
                $row = 1;
                foreach ($model->detailpemesanans as $ddtl) { ?>
                <tbody>
                    <tr>
                        <td><?= $row ?></td>
                        <td><?= $ddtl->idProduk ?></td>
                        <td><?= $ddtl->produk->namaProduk ?></td>
                        <td id="jumlahPemesanan"><?= $ddtl->jumlahPemesanan ?></td>
                        <td id="harga"><?= $ddtl->harga ?></td>                
                    </tr>
                </tbody>
    <?php $row++; } ?>                    
        </table>
        <div class="col-md-15, table table-hover" style="width: 30%; float: right;">
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>TOTAL PRICE</th>
                    <th id="total">1.000.000</th>
                </tr>
            </thead>            
        </table>
        </div>
    </div>
</div>