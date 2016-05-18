<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Barang;

/**
 * Barang represents the model behind the search form about `app\models\Barang`.
 */
class BarangSearch extends Barang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'tanggal_terima'], 'safe'],
            [['id_supplier','nama', 'jumlah', 'harga_beli', 'harga_jual', 'biaya_simpan', 'biaya_pesan', 'lead_time'], 'integer'],
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
        $query = Barang::find();

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
            'id_supplier' => $this->id_supplier,
            'tanggal_terima' => $this->tanggal_terima,
            'jumlah' => $this->jumlah,
            'harga_beli' => $this->harga_beli,
            'harga_jual' => $this->harga_jual,
            'biaya_simpan' => $this->biaya_simpan,
            'biaya_pesan' => $this->biaya_pesan,
            'lead_time' => $this->lead_time,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
        ->andFilterWhere(['like', 'kode', $this->kode]);

        return $dataProvider;
    }
}
