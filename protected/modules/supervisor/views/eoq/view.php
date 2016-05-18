<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Eoq */

$this->title = $model->barang->nama;
$this->params['header']=$this->title;
$this->params['subheader']="Detail EOQ ".$this->title;
$this->params['breadcrumbs'][] = ['label' => 'Eoq', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eoq-view">
    <p>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-flat bg-olive']) ?>
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
            'tanggal',
            [
                'label'=>'Barang',
                'value'=>$model->barang->nama
            ],
            'harga_beli',
            'biaya_pesan',
            'biaya_simpan',
            'biaya_simpan_perunit',
            'permintaan',
            'eoq',
            'lead_time',
            'periode',
            'rop',
        ],
    ]) ?>

</div>
