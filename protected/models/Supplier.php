<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property string $telp
 * @property string $kota
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','nama', 'alamat', 'telp', 'kota'], 'required'],
            [['alamat', 'kota'], 'string'],
            [['id'], 'string', 'max' => 50],
            [['nama'], 'string', 'max' => 255],
            [['telp'], 'string', 'max' => 100],
            [['id'],'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID Supplier',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'telp' => 'Telepon',
            'kota' => 'Kota',
        ];
    }
}
