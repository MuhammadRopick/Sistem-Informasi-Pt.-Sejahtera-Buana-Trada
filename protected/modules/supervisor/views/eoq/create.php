<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Eoq */

$this->title = 'Tambah Eoq';
$this->params['header']=$this->title;
$this->params['subheader']="Form ".$this->title;
$this->params['breadcrumbs'][] = ['label' => 'Eoq', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
        'model' => $model,
        'barang'=>$barang
    ]) ?>
