<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eoq".
 *
 * @property integer $id
 * @property string $tanggal
 * @property string $id_barang
 * @property integer $biaya_pesan
 * @property integer $biaya_simpan
 * @property integer $jumlah
 * @property integer $permintaan
 * @property integer $eoq
 * @property string $lead_time
 * @property integer $periode
 * @property integer $rop
 * @property integer $total
 */
class Eoq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eoq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal', 'id_barang','harga_beli', 'biaya_pesan', 'biaya_simpan','biaya_simpan_perunit', 'permintaan', 'eoq', 'lead_time', 'periode', 'rop'], 'required'],
            [['tanggal'], 'safe'],
            [['harga_beli','biaya_pesan', 'biaya_simpan','biaya_simpan_perunit', 'permintaan', 'periode', 'rop'], 'integer'],
            [['id_barang', 'lead_time'], 'string', 'max' => 50],
            [['eoq'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'id_barang' => 'Barang',
            'harga_beli'=>'Harga Beli',
            'biaya_pesan' => 'Biaya Pesan',
            'biaya_simpan' => 'Biaya Simpan Perpesanan',
            'biaya_simpan_perunit'=>'Biaya Simpan Perunit',
            'permintaan' => 'Permintaan',
            'eoq' => 'Eoq',
            'lead_time' => 'Lead Time',
            'periode' => 'Periode',
            'rop' => 'Rop',
        ];
    }
    function getBarang()
    {
        return $this->hasOne(Barang::classname(),['kode'=>'id_barang']);
    }
}
