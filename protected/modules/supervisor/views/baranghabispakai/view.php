<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BarangHabisPakai */

$this->title = $model->barang->nama;
$this->params['header']=$this->title;
$this->params['subheader']="Detail ".$this->title;
$this->params['breadcrumbs'][] = ['label' => 'Barang Habis Pakai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-habis-pakai-view">
    <p>
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
                'label'=>'Barang',
                'value'=>$model->barang->nama
            ],
            'tanggal',
        ],
    ]) ?>

</div>
