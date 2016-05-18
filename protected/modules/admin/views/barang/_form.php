<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Barang */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'id_supplier')->dropDownList(ArrayHelper::map($supplier,'id','nama'),['prompt'=>'-- pilih supplier --']) ?>
        <label for="tgl_terima">Tanggal Terima</label>
        <?php
        echo DatePicker::widget([
            'model' => $model,
            'attribute' => 'tanggal_terima',
            'options'=>['class'=>'form-control','id'=>'tgl_terima'],
            'language' => 'id',
            'dateFormat' => 'yyyy-MM-dd',
        ]);
         ?>
        <?= $form->field($model, 'jumlah')->textInput() ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'harga_beli')->textInput() ?>

        <?= $form->field($model, 'harga_jual')->textInput() ?>

        <?= $form->field($model, 'biaya_simpan')->textInput() ?>

        <?= $form->field($model, 'biaya_pesan')->textInput() ?>

        <?= $form->field($model, 'lead_time')->textInput() ?>
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
