<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "import".
 *
 * @property int $idImport
 * @property string $idProduk
 * @property int $stok
 *
 * @property Produk $produk
 */
class Import extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'import';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProduk'], 'required'],
            [['stok'], 'integer'],
            [['idProduk'], 'string', 'max' => 20],
            [['idProduk'], 'exist', 'skipOnError' => true, 'targetClass' => Produk::className(), 'targetAttribute' => ['idProduk' => 'idProduk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idImport' => 'Id Import',
            'idProduk' => 'Id Produk',
            'stok' => 'Stok',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduk()
    {
        return $this->hasOne(Produk::className(), ['idProduk' => 'idProduk']);
    }
}
