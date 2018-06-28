<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemesanan".
 *
 * @property int $idPemesanan
 * @property int $idPelanggan
 * @property string $tanggalPesan
 * @property string $tanggalKirim
 * @property string $status
 *
 * @property Detailpemesanan[] $detailpemesanans
 * @property Pelanggan $pelanggan
 */
class Pemesanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPelanggan'], 'required'],
            [['idPelanggan'], 'integer'],
            [['tanggalPesan', 'tanggalKirim'], 'safe'],
            [['status'], 'string', 'max' => 45],
            [['idPelanggan'], 'exist', 'skipOnError' => true, 'targetClass' => Pelanggan::className(), 'targetAttribute' => ['idPelanggan' => 'idPelanggan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPemesanan' => 'Id Pemesanan',
            'idPelanggan' => 'Id Pelanggan',
            'tanggalPesan' => 'Tanggal Pesan',
            'tanggalKirim' => 'Tanggal Kirim',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailpemesanans()
    {
        return $this->hasMany(Detailpemesanan::className(), ['idPemesanan' => 'idPemesanan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelanggan()
    {
        return $this->hasOne(Pelanggan::className(), ['idPelanggan' => 'idPelanggan']);
    }
    public function getJumlahItem()
    {
        return count($this->detailpemesanans);   
    }
}
