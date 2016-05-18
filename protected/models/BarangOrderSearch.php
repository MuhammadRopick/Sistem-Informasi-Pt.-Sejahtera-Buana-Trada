<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BarangOrder;

/**
 * BarangOrderSearch represents the model behind the search form about `app\models\BarangOrder`.
 */
class BarangOrderSearch extends BarangOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_supplier', 'jumlah'], 'integer'],
            [['id_barang', 'tgl_order'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = BarangOrder::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_supplier' => $this->id_supplier,
            'jumlah' => $this->jumlah,
            'tgl_order' => $this->tgl_order,
        ]);

        $query->andFilterWhere(['like', 'id_barang', $this->id_barang]);

        return $dataProvider;
    }
}
