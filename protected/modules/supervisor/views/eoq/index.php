<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EoqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'EOQ';
$this->params['header']=$this->title;
$this->params['subheader']="Data ".$this->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eoq-index">
    <p>
        <?= Html::a('Tambah EOQ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tanggal',
            [
                'label'=>'Barang',
                'attribute'=>'id_barang',
                'value'=>function($data)
                {
                    return $data->barang->nama;
                },
                'filter'=>ArrayHelper::map($barang,'kode','nama')
            ],
            'biaya_pesan',
            'biaya_simpan',
            // 'jumlah',
            // 'permintaan',
            // 'eoq',
            // 'lead_time',
            // 'periode',
            // 'rop',
            // 'total',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
