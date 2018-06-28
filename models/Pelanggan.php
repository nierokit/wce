<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelanggan".
 *
 * @property int $idPelanggan
 * @property string $namaPelanggan
 * @property string $alamatPelanggan
 *
 * @property Pemesanan[] $pemesanans
 */
class Pelanggan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pelanggan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPelanggan'], 'required'],
            [['idPelanggan'], 'integer'],
            [['namaPelanggan', 'alamatPelanggan'], 'string', 'max' => 45],
            [['idPelanggan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPelanggan' => 'Id Pelanggan',
            'namaPelanggan' => 'Nama Pelanggan',
            'alamatPelanggan' => 'Alamat Pelanggan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesanans()
    {
        return $this->hasMany(Pemesanan::className(), ['idPelanggan' => 'idPelanggan']);
    }
}
