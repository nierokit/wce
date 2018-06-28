<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produk".
 *
 * @property string $idProduk
 * @property string $namaProduk
 * @property string $idJenisProduk
 * @property int $stok
 * @property string $harga
 * @property string $description
 *
 * @property Detailpemesanan[] $detailpemesanans
 * @property Import[] $imports
 * @property Jenisproduk $jenisProduk
 */
class Produk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProduk', 'idJenisProduk'], 'required'],
            [['stok'], 'integer'],
            [['harga'], 'number'],
            [['idProduk', 'idJenisProduk'], 'string', 'max' => 20],
            [['namaProduk'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 80],
            [['idProduk'], 'unique'],
            [['idJenisProduk'], 'exist', 'skipOnError' => true, 'targetClass' => Jenisproduk::className(), 'targetAttribute' => ['idJenisProduk' => 'idJenisProduk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProduk' => 'Id Produk',
            'namaProduk' => 'Nama Produk',
            'idJenisProduk' => 'Id Jenis Produk',
            'stok' => 'Stok',
            'harga' => 'Harga',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailpemesanans()
    {
        return $this->hasMany(Detailpemesanan::className(), ['idProduk' => 'idProduk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImports()
    {
        return $this->hasMany(Import::className(), ['idProduk' => 'idProduk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisProduk()
    {
        return $this->hasOne(Jenisproduk::className(), ['idJenisProduk' => 'idJenisProduk']);
    }
}
