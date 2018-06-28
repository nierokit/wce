<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jenisproduk;

/**
 * JenisprodukSearch represents the model behind the search form of `app\models\Jenisproduk`.
 */
class JenisprodukSearch extends Jenisproduk
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idJenisProduk', 'jenisProduk'], 'safe'],
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
        $query = Jenisproduk::find();

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
        $query->andFilterWhere(['like', 'idJenisProduk', $this->idJenisProduk])
            ->andFilterWhere(['like', 'jenisProduk', $this->jenisProduk]);

        return $dataProvider;
    }
}
