<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EoqSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eoq-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?= $form->field($model, 'id_barang') ?>

    <?= $form->field($model, 'biaya_pesan') ?>

    <?= $form->field($model, 'biaya_simpan') ?>

    <?php // echo $form->field($model, 'jumlah') ?>

    <?php // echo $form->field($model, 'permintaan') ?>

    <?php // echo $form->field($model, 'eoq') ?>

    <?php // echo $form->field($model, 'lead_time') ?>

    <?php // echo $form->field($model, 'periode') ?>

    <?php // echo $form->field($model, 'rop') ?>

    <?php // echo $form->field($model, 'total') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
