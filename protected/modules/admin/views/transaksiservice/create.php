<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TransaksiService */

$this->title = 'Tambah Transaksi Service';
$this->params['header']=$this->title;
$this->params['subheader']="Form ".$this->title;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Service', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
    'mekanik'=>$mekanik,
    'pelanggan'=>$pelanggan,
    'barang'=>$barang
]) ?>
