<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang_order".
 *
 * @property integer $id
 * @property string $id_barang
 * @property integer $id_supplier
 * @property integer $jumlah
 * @property string $tgl_order
 */
class BarangOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_barang', 'id_supplier', 'jumlah', 'tgl_order'], 'required'],
            [['jumlah'], 'integer'],
            [['tgl_order'], 'safe'],
            [['id_barang','id_supplier'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_barang' => 'Nama Barang',
            'id_supplier' => 'Nama Supplier',
            'jumlah' => 'Jumlah',
            'tgl_order' => 'Tanggal Order',
        ];
    }
    function getBarang()
    {
        return $this->hasOne(Barang::classname(),['kode'=>'id_barang']);
    }
    function getSupplier()
    {
        return $this->hasOne(Supplier::classname(),['id'=>'id_supplier']);
    }
}
