<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransaksiService;

/**
 * TransaksiServiceSearch represents the model behind the search form about `app\models\TransaksiService`.
 */
class TransaksiServiceSearch extends TransaksiService
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_mekanik', 'id_pelanggan', 'jumlah', 'harga', 'total'], 'integer'],
            [['tanggal', 'id_barang'], 'safe'],
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
        $query = TransaksiService::find();

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
            'id_mekanik' => $this->id_mekanik,
            'id_pelanggan' => $this->id_pelanggan,
            'tanggal' => $this->tanggal,
            'jumlah' => $this->jumlah,
            'harga' => $this->harga,
            'total' => $this->total,
        ]);

        $query->andFilterWhere(['like', 'id_barang', $this->id_barang]);

        return $dataProvider;
    }
}
