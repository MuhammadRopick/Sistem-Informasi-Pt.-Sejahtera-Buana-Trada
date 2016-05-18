<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Barang */

$this->title = $model->nama;
$this->params['header']=$this->title;
$this->params['subheader']="Detail ".$this->title;
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <p>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-flat bg-olive']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->kode], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kode], [
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
            'kode',
            'nama',
            [
                'label'=>'Supplier',
                'value'=>@$model->supplier->nama
            ],
            'tanggal_terima',
            'jumlah',
            'harga_beli',
            'harga_jual',
            'biaya_simpan',
            'biaya_pesan',
            'lead_time',
            //'lead_time:datetime',
        ],
    ]) ?>

</div>
