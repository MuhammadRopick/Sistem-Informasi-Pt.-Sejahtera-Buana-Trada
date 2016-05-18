<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Eoq */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-6">
        <label for="tgl_terima">Tanggal</label>
        <?php
        echo DatePicker::widget([
            'model' => $model,
            'attribute' => 'tanggal',
            'options'=>['class'=>'form-control','id'=>'tgl_terima'],
            'language' => 'id',
            'dateFormat' => 'yyyy-MM-dd',
        ]);
        ?>
        <?= $form->field($model, 'id_barang')->dropDownList(ArrayHelper::map($barang,'kode','kode'),['prompt'=>'-- pilih barang --']) ?>
        <input type="text" id="nmbarang" class="form-control" readonly="readonly">
        <?= $form->field($model, 'harga_beli')->textInput(['class'=>'form-control harga_beli']) ?>
        <?= $form->field($model, 'biaya_pesan')->textInput(['class'=>'form-control biaya_pesan']) ?>
        <?= $form->field($model, 'biaya_simpan')->textInput(['class'=>'form-control biaya_simpan']) ?>
        <?= $form->field($model, 'biaya_simpan_perunit')->textInput(['class'=>'form-control biaya_simpan_perunit','readonly'=>'readonly']) ?>
        <?= $form->field($model, 'permintaan')->textInput(['class'=>'form-control permintaan']) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'eoq')->textInput(['readonly'=>'readonly','class'=>'form-control eoq']) ?>
        <?= $form->field($model, 'lead_time')->textInput(['maxlength' => true,'class'=>'form-control lead_time']) ?>
        <?= $form->field($model, 'periode')->textInput(['class'=>'form-control periode']) ?>
        <?= $form->field($model, 'rop')->textInput(['class'=>'form-control rop','readonly'=>'readonly']) ?>
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); 

$this->registerJs('

    $(function()
    {
        $("#eoq-id_barang").change(function()
        {
            var idb=$(this).val();
            if(idb)
            {
                $.ajax({
                    url:"'.Url::to(['getbarang']).'",
                    type:"POST",
                    dataType:"JSON",
                    data:{param:idb},
                    success:function(data)
                    {
                        $("#nmbarang").val(data.nama);
                        $("#eoq-harga_beli").val(data.harga);
                    }
                })
            }
        });
        $(".harga_beli").keyup(function()
        {
            var biaya_simpan = $(".biaya_simpan").val();
            if(biaya_simpan!="")
            {
                var harga_beli=$(this).val();
                var tmp=(harga_beli*biaya_simpan);
                $(".biaya_simpan_perunit").val(tmp);
            }
        });
        $(".biaya_simpan").keyup(function()
        {
            var harga_beli = $(".harga_beli").val();
            if(harga_beli!="")
            {
                var biaya_simpan=$(this).val();
                var tmp=(harga_beli*biaya_simpan);
                $(".biaya_simpan_perunit").val(tmp);
            }
        });

        $(".permintaan").keyup(function()
        {
            var biaya_pesan = $(".biaya_pesan").val();
            var biaya_simpan_perunit = $(".biaya_simpan_perunit").val();
            var permintaan=$(this).val();

            var tmp=(2*biaya_pesan*permintaan);
            var finalTmp = Math.sqrt(tmp);
            var final = finalTmp/biaya_simpan_perunit;
            $(".eoq").val(final);

            //ROP
            var lead_time = $(".lead_time").val();
            var periode = $(".periode").val();
            if(lead_time!="" && periode!="")
            {
                var tmprop=(permintaan*lead_time)/periode;
                $(".rop").val(tmprop);
            }
        });
        
        //ROP
        $(".periode").keyup(function()
        {
            var lead_time = $(".lead_time").val();
            var permintaan=$(".permintaan").val();
            if(lead_time!="" && permintaan!="")
            {
                var periode=$(this).val();
                var tmp=(permintaan*lead_time)/periode;
                $(".rop").val(tmp);
            }
        });
        $(".lead_time").keyup(function()
        {
            var periode = $(".periode").val();
            var permintaan=$(".permintaan").val();
            if(periode!="" && permintaan!="")
            {
                var lead_time=$(this).val();
                var tmp=(permintaan*lead_time)/periode;
                $(".rop").val(tmp);
            }
        });

    });

    ');