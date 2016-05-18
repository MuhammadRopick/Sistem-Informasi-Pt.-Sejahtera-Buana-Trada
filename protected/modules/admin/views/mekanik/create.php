<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mekanik */

$this->title = 'Tambah Mekanik';
$this->params['header']=$this->title;
$this->params['subheader']="Form ".$this->title;
$this->params['breadcrumbs'][] = ['label' => 'Mekanik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
