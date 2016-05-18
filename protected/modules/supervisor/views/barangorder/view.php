<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BarangOrder */

$this->title = $model->barang->nama;
$this->params['header']=$this->title;
$this->params['subheader']="Detail ".$this->title;
$this->params['breadcrumbs'][] = ['label' => 'Barang Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

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
            [
                'label'=>'Nama Barang',
                'value'=>$model->barang->nama
            ],
            [
                'label'=>'Nama Supplier',
                'value'=>$model->supplier->nama
            ],
            'jumlah',
            'tgl_order',
        ],
    ]) ?>
