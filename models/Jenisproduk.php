<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenisproduk".
 *
 * @property string $idJenisProduk
 * @property string $jenisProduk
 *
 * @property Produk[] $produks
 */
class Jenisproduk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenisproduk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idJenisProduk'], 'required'],
            [['idJenisProduk'], 'string', 'max' => 20],
            [['jenisProduk'], 'string', 'max' => 45],
            [['idJenisProduk'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idJenisProduk' => 'Id Jenis Produk',
            'jenisProduk' => 'Jenis Produk',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduks()
    {
        return $this->hasMany(Produk::className(), ['idJenisProduk' => 'idJenisProduk']);
    }
}
