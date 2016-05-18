<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TransaksiService */

$this->title = $model->mekanik->nama;
$this->params['header']=$this->title;
$this->params['subheader']="Detail ".$this->title;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Service', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-service-view">
    <p>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-primary btn-flat bg-navy']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label'=>'Mekanik',
                'value'=>$model->mekanik->nama
            ],
            [
                'label'=>'Pelanggan',
                'value'=>$model->pelanggan->nama
            ],
            [
                'label'=>'Barang',
                'value'=>$model->barang->nama
            ],
            'tanggal',
            'jumlah',
            'harga',
            'total',
        ],
    ]) ?>

</div>
