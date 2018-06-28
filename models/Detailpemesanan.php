<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detailpemesanan".
 *
 * @property int $id
 * @property int $idPemesanan
 * @property string $idProduk
 * @property string $jumlahPemesanan
 * @property string $harga
 *
 * @property Pemesanan $pemesanan
 * @property Produk $produk
 */
class Detailpemesanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detailpemesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPemesanan', 'idProduk'], 'required'],
            [['idPemesanan'], 'integer'],
            [['harga'], 'number'],
            [['idProduk'], 'string', 'max' => 20],
            [['jumlahPemesanan'], 'string', 'max' => 45],
            [['idPemesanan'], 'exist', 'skipOnError' => true, 'targetClass' => Pemesanan::className(), 'targetAttribute' => ['idPemesanan' => 'idPemesanan']],
            [['idProduk'], 'exist', 'skipOnError' => true, 'targetClass' => Produk::className(), 'targetAttribute' => ['idProduk' => 'idProduk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idPemesanan' => 'Id Pemesanan',
            'idProduk' => 'Id Produk',
            'jumlahPemesanan' => 'Jumlah Pemesanan',
            'harga' => 'Harga',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesanan()
    {
        return $this->hasOne(Pemesanan::className(), ['idPemesanan' => 'idPemesanan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduk()
    {
        return $this->hasOne(Produk::className(), ['idProduk' => 'idProduk']);
    }
}
