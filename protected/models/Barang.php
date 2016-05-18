<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang".
 *
 * @property string $kode
 * @property integer $id_supplier
 * @property string $tanggal_terima
 * @property integer $jumlah
 * @property integer $harga_beli
 * @property integer $harga_jual
 * @property integer $biaya_simpan
 * @property integer $biaya_pesan
 * @property integer $lead_time
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'id_supplier', 'nama','tanggal_terima', 'jumlah', 'harga_beli', 'harga_jual', 'biaya_simpan', 'biaya_pesan', 'lead_time'], 'required'],
            [['jumlah', 'harga_beli', 'harga_jual', 'biaya_simpan', 'biaya_pesan'], 'integer'],
            [['tanggal_terima'], 'safe'],
            [['kode','lead_time','id_supplier'], 'string', 'max' => 50],
            [['nama'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'id_supplier' => 'Supplier',
            'nama'=>'Nama Barang',
            'tanggal_terima' => 'Tanggal Terima',
            'jumlah' => 'Jumlah',
            'harga_beli' => 'Harga Beli',
            'harga_jual' => 'Harga Jual',
            'biaya_simpan' => 'Biaya Simpan',
            'biaya_pesan' => 'Biaya Pesan',
            'lead_time' => 'Lead Time',
        ];
    }
    function getSupplier()
    {
        return $this->hasOne(Supplier::classname(),['id'=>'id_supplier']);
    }
}
