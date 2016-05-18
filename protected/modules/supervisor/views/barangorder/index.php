<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BarangOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Barang Order';
$this->params['header']=$this->title;
$this->params['subheader']="Data ".$this->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <?= Html::a('Tambah Barang Order', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'label'=>'Nama Barang',
            'attribute'=>'id_barang',
            'value'=>function($data)
            {
                return @$data->barang->nama;
            },
            'filter'=>ArrayHelper::map($barang,'kode','nama')
        ],
        [
            'label'=>'Supplier',
            'attribute'=>'id_supplier',
            'value'=>function($data)
            {
                return @$data->supplier->nama;
            },
            'filter'=>ArrayHelper::map($supplier,'id','nama')
        ],
        'jumlah',
        'tgl_order',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
