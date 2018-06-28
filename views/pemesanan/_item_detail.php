<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\bootstrap\Html;
use app\models\Detailpemesanan;
use app\models\Produk;
?>
<td>
    <span id="idProduk">
        <?= Html::getAttributeValue($model, "[$key]idProduk",['class'=>'form-control','data-field'=>'idProduk']) ?>
    </span>
        <?= Html::hiddenInput("detailpemesanan[$key][idProduk]",NULL,['id'=>'oidProduk']); ?>
</td>
<td>
    <span id="namaProduk">
        <?= Html::getAttributeValue($model, "[$key]produk[namaProduk]",['class'=>'form-control','data-field'=>'namaProduk']) ?>
    </span>
</td>
<td>
    <span id="jumlahPemesanan">
        <?= Html::getAttributeValue($model, "[$key]jumlahPemesanan",['class'=>'form-control','data-field'=>'jumlahPemesanan']) ?>        
    </span>
        <?= Html::hiddenInput("detailpemesanan[$key][jumlahPemesanan]",NULL,['id'=>'ojumlahPemesanan']); ?>
</td>        
<td>
    <span id="harga">
        <?= Html::getAttributeValue($model, "[$key]harga",['class'=>'form-control','data-field'=>'harga']) ?>        
    </span>
        <?= Html::hiddenInput("detailpemesanan[$key][harga]",NULL,['id'=>'oharga']); ?>
</td>
<td><a data-action="delete"><span class="glyphicon glyphicon-trash btn btn-danger btn-sm"></span></a></td>