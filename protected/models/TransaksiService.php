<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi_service".
 *
 * @property integer $id
 * @property integer $id_mekanik
 * @property integer $id_pelanggan
 * @property string $tanggal
 * @property string $id_barang
 * @property integer $jumlah
 * @property integer $harga
 * @property integer $total
 */
class TransaksiService extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaksi_service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mekanik', 'id_pelanggan', 'tanggal', 'id_barang', 'jumlah', 'harga', 'total'], 'required'],
            [['id_mekanik','jumlah', 'harga', 'total'], 'integer'],
            [['tanggal'], 'safe'],
            [['id_barang'], 'string', 'max' => 50],
            [['id_pelanggan'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_mekanik' => 'Mekanik',
            'id_pelanggan' => 'Pelanggan',
            'tanggal' => 'Tanggal',
            'id_barang' => 'Barang',
            'jumlah' => 'Jumlah',
            'harga' => 'Harga',
            'total' => 'Total',
        ];
    }
    function getMekanik()
    {
        return $this->hasOne(Mekanik::classname(),['id'=>'id_mekanik']);
    }
    function getPelanggan()
    {
        return $this->hasOne(Pelanggan::classname(),['id'=>'id_pelanggan']);
    }
    function getBarang()
    {
        return $this->hasOne(Barang::classname(),['kode'=>'id_barang']);
    }
}
