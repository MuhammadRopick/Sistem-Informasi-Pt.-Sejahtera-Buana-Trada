<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang_habis_pakai".
 *
 * @property integer $id
 * @property string $id_barang
 * @property string $tanggal
 */
class BarangHabisPakai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang_habis_pakai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_barang', 'tanggal'], 'required'],
            [['tanggal'], 'safe'],
            [['id_barang'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_barang' => 'Barang',
            'tanggal' => 'Tanggal',
        ];
    }
    function getBarang()
    {
        return $this->hasOne(Barang::classname(),['kode'=>'id_barang']);
    }
}
