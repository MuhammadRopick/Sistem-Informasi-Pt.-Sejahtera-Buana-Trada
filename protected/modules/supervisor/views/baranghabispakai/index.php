<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BarangHabisPakaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Barang Habis Pakai';
$this->params['header']=$this->title;
$this->params['subheader']="Data ".$this->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-habis-pakai-index">
    <p>
        <?= Html::a('Tambah Barang Habis Pakai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label'=>'Barang',
                'attribute'=>'id_barang',
                'value'=>function($data)
                {
                    return $data->barang->nama;
                },
                'filter'=>ArrayHelper::map($barang,'kode','nama')
            ],
            'tanggal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
