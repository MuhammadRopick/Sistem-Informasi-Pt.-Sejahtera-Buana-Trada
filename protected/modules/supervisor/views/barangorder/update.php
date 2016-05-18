<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BarangOrder */

$this->title = 'Edit Barang Order: ' . ' ' . $model->barang->nama;
$this->params['header']=$this->title;
$this->params['subheader']="Form ".$this->title;
$this->params['breadcrumbs'][] = ['label' => 'Barang Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('_form', [
    'model' => $model,
    'barang'=>$barang,
    'supplier'=>$supplier
]) ?>
