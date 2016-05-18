<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BarangHabisPakai */

$this->title = 'Tambah Barang Habis Pakai';
$this->params['header']=$this->title;
$this->params['subheader']="Form ".$this->title;
$this->params['breadcrumbs'][] = ['label' => 'Barang Habis Pakai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
        'model' => $model,
        'barang'=>$barang
    ]) ?>
