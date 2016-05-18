<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\Pelanggan */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pelanggan';
$this->params['header']=$this->title;
$this->params['subheader']="Data ".$this->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <?= Html::a('Tambah Pelanggan', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'nama',
        'alamat:ntext',
        [
            'label'=>'Jenis Kendaraan',
            'attribute'=>'jenis_kendaraan',
            'value'=>function($data)
            {
                return $data->jeniskendaraan->nama;
            },
            'filter'=>ArrayHelper::map($kendaraan,'id','nama')
        ],
        'tahun',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
