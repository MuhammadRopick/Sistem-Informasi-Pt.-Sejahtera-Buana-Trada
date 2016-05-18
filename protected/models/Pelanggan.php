<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelanggan".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property string $jenis_kendaraan
 * @property string $tahun
 */
class Pelanggan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelanggan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','nama', 'alamat', 'jenis_kendaraan', 'tahun'], 'required'],
            [['alamat'], 'string'],
            [['tahun'], 'safe'],
            [['nama'], 'string', 'max' => 255],
            [['id'], 'string', 'max' => 10],
            [['id'],'unique'],
            [['jenis_kendaraan'],'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Kode Pelanggan',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'jenis_kendaraan' => 'Jenis Kendaraan',
            'tahun' => 'Tahun',
        ];
    }
    function getJeniskendaraan()
    {
        return $this->hasOne(JenisKendaraan::classname(),['id'=>'jenis_kendaraan']);
    }
}
