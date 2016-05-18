<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pelanggan */

$this->title = 'Edit Pelanggan: ' . ' ' . $model->nama;
$this->params['header']=$this->title;
$this->params['subheader']="Form ".$this->title;
$this->params['breadcrumbs'][] = ['label' => 'Pelanggan', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('_form', [
        'model' => $model,
        'kendaraan'=>$kendaraan
    ]) ?>
