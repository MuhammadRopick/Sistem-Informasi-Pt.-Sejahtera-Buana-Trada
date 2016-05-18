<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TransaksiServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksi Service';
$this->params['header']=$this->title;
$this->params['subheader']="Data ".$this->title;
$this->params['breadcrumbs'][] = $this->title;
?>

    <p>
        <?= Html::a('Tambah Transaksi Service', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'label'=>'Mekanik',
            'attribute'=>'id_mekanik',
            'value'=>function($data)
            {
                return @$data->mekanik->nama;
            },
            'filter'=>ArrayHelper::map($mekanik,'id','nama')
        ],
        [
            'label'=>'Pelanggan',
            'attribute'=>'id_pelanggan',
            'value'=>function($data)
            {
                return @$data->pelanggan->nama;
            },
            'filter'=>ArrayHelper::map($pelanggan,'id','nama')
        ],
        [
            'label'=>'Barang',
            'attribute'=>'id_barang',
            'value'=>function($data)
            {
                return @$data->barang->nama;
            },
            'filter'=>ArrayHelper::map($barang,'kode','nama')
        ],
        'tanggal',
        'jumlah',
        // 'harga',
        // 'total',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
