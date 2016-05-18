<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mekanik */

$this->title = 'Edit Mekanik: ' . ' ' . $model->nama;
$this->params['header']=$this->title;
$this->params['subheader']="Form ".$this->title;
$this->params['breadcrumbs'][] = ['label' => 'Mekanik', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
