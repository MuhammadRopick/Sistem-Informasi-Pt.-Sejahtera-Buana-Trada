<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Supplier */

$this->title = 'Tambah Supplier';
$this->params['header']=$this->title;
$this->params['subheader']="Form ".$this->title;
$this->params['breadcrumbs'][] = ['label' => 'Supplier', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
