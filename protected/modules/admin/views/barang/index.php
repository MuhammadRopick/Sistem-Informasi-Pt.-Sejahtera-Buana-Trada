<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\Barang */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Barang';
$this->params['header']=$this->title;
$this->params['subheader']="Data ".$this->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <?= Html::a('Tambah Barang', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'kode',
        [
            'label'=>'Supplier',
            'attribute'=>'id_supplier',
            'value'=>function($data)
            {
                return @$data->supplier->nama;
            },
            'filter'=>ArrayHelper::map($supplier,'id','nama')
        ],
        'nama',
        'tanggal_terima',
        'jumlah',
        'harga_beli',
        // 'harga_jual',
        // 'biaya_simpan',
        // 'biaya_pesan',
        // 'lead_time:datetime',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>