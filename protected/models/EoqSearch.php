<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Eoq;

/**
 * EoqSearch represents the model behind the search form about `app\models\Eoq`.
 */
class EoqSearch extends Eoq
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'biaya_pesan', 'biaya_simpan', 'permintaan', 'eoq', 'periode', 'rop'], 'integer'],
            [['tanggal', 'id_barang', 'lead_time'], 'safe'],
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
        $query = Eoq::find();
        $query->orderBy(['tanggal'=>SORT_DESC]);
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
            'tanggal' => $this->tanggal,
            'biaya_pesan' => $this->biaya_pesan,
            'biaya_simpan' => $this->biaya_simpan,
            'permintaan' => $this->permintaan,
            'eoq' => $this->eoq,
            'periode' => $this->periode,
            'rop' => $this->rop,
        ]);

        $query->andFilterWhere(['like', 'id_barang', $this->id_barang])
            ->andFilterWhere(['like', 'lead_time', $this->lead_time]);

        return $dataProvider;
    }
}
