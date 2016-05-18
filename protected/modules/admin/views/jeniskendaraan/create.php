<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JenisKendaraan */

$this->title = 'Tambah Jenis Kendaraan';
$this->params['header']=$this->title;
$this->params['subheader']="Form ".$this->title;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Kendaraans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>