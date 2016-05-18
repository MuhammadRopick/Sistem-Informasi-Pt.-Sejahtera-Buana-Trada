<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Eoq */

$this->title = 'Edit Eoq: ' . ' ' . $model->barang->nama;
$this->params['header']=$this->title;
$this->params['subheader']="Form ".$this->title;
$this->params['breadcrumbs'][] = ['label' => 'Eoqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="eoq-update">
    <?= $this->render('_form', [
        'model' => $model,
        'barang'=>$barang
    ]) ?>

</div>
