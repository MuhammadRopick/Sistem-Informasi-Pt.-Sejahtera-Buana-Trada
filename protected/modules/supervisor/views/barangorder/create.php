<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BarangOrder */

$this->title = 'Tambah Barang Order';
$this->params['header']=$this->title;
$this->params['subheader']="Form ".$this->title;
$this->params['breadcrumbs'][] = ['label' => 'Barang Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
    'barang'=>$barang,
    'supplier'=>$supplier
]) ?>
