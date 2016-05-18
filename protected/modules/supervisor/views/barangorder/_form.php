<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\BarangOrder */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs('

    $("#barangorder-id_barang").change(function()
    {
        var idb=$(this).val();
        if(idb)
        {
            $.post("'.Url::to(['getbarang']).'",{param:idb},function(data)
            {
                $("#namabrg").val(data);
            });
        }
    });

    $("#barangorder-id_supplier").change(function()
    {
        var idsup=$(this).val();
        if(idsup)
        {
            $.post("'.Url::to(['getsupplier']).'",{param:idsup},function(data)
            {
                $("#namasup").val(data);
            });
        }
    });
');
?>

<div class="barang-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_barang')->dropDownList(ArrayHelper::map($barang,'kode','kode'),['prompt'=>'-- pilih barang --']) ?>
    <input type="text" id="namabrg" class="form-control" readonly="readonly" placeholder="nama barang">
    <?= $form->field($model, 'id_supplier')->dropDownList(ArrayHelper::map($supplier,'id','id'),['prompt'=>'-- pilih supplier --']) ?>
    <input type="text" id="namasup" class="form-control" readonly="readonly" placeholder="nama supplier">
    <?= $form->field($model, 'jumlah')->textInput() ?>
    <label for="tgl_order">Tanggal Order</label>
    <?php
    echo DatePicker::widget([
        'model' => $model,
        'attribute' => 'tgl_order',
        'options'=>['class'=>'form-control','id'=>'tgl_order'],
        'language' => 'id',
        'dateFormat' => 'yyyy-MM-dd',
    ]);
     ?>
     
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
