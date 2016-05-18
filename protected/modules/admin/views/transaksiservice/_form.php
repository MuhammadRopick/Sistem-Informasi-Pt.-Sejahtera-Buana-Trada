<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'id_mekanik')->dropDownList(ArrayHelper::map($mekanik,'id','nama'),['prompt'=>'-- pilih mekanik --']) ?>
        <?= $form->field($model, 'id_pelanggan')->dropDownList(ArrayHelper::map($pelanggan,'id','id'),['prompt'=>'-- pilih pelanggan --']) ?>
        <input type="text" id="nmpelanggan" readonly="readonly" class="form-control">
        <?= $form->field($model, 'id_barang')->dropDownList(ArrayHelper::map($barang,'kode','nama'),['prompt'=>'-- pilih barang --']) ?>
        <div class="detailbarang"></div>
    </div>
    <div class="col-md-6">
        <label for="tanggal">Tanggal</label>
        <?php
        echo DatePicker::widget([
            'model' => $model,
            'attribute' => 'tanggal',
            'options'=>['class'=>'form-control','id'=>'tanggal'],
            'language' => 'id',
            'dateFormat' => 'yyyy-MM-dd',
        ]);
         ?>
        <?= $form->field($model, 'jumlah')->textInput(['class'=>'form-control']) ?>
        <?= $form->field($model, 'harga')->textInput() ?>
        <?= $form->field($model, 'total')->textInput() ?>
    </div>
    
</div>
<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end();
$this->registerJs('

    $("#transaksiservice-id_pelanggan").change(function()
    {
        var ids=$(this).val();
        $.post("'.Url::to(["getpelanggan"]).'",{param:ids},function(data)
        {
            $("#nmpelanggan").val(data);
        });
    });
    $("#transaksiservice-id_barang").change(function()
    {
        var ids=$(this).val();
        $.post("'.Url::to(["gethargabarang"]).'",{param:ids},function(data)
        {
            $("#transaksiservice-harga").val(data);
        });
    });
');