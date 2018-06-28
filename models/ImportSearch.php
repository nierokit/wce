<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Import;

/**
 * ImportSearch represents the model behind the search form of `app\models\Import`.
 */
class ImportSearch extends Import
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idImport', 'stok'], 'integer'],
            [['idProduk'], 'safe'],
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
        $query = Import::find();

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
            'idImport' => $this->idImport,
            'stok' => $this->stok,
        ]);

        $query->andFilterWhere(['like', 'idProduk', $this->idProduk]);

        return $dataProvider;
    }
}
