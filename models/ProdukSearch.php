<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produk;

/**
 * ProdukSearch represents the model behind the search form of `app\models\Produk`.
 */
class ProdukSearch extends Produk
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProduk', 'namaProduk', 'idJenisProduk', 'description'], 'safe'],
            [['stok'], 'integer'],
            [['harga'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Produk::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'stok' => $this->stok,
            'harga' => $this->harga,
        ]);

        $query->andFilterWhere(['like', 'idProduk', $this->idProduk])
            ->andFilterWhere(['like', 'namaProduk', $this->namaProduk])
            ->andFilterWhere(['like', 'idJenisProduk', $this->idJenisProduk])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
