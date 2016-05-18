<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\BarangHabisPakai */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs('

	$("#baranghabispakai-id_barang").change(function()
	{
		var idb=$(this).val();
		if(idb)
		{
			$.post("'.Url::to(['getbarang']).'",{param:idb},function(data)
			{
				$("#nmbarang").val(data);
			});
		}
	});

	');
?>

<div class="row">
	<div class="col-md-6">
	    <?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model, 'id_barang')->dropDownList(ArrayHelper::map($barang,'kode','kode'),['prompt'=>'-- pilih barang --']) ?>
	    <input type="text" id="nmbarang" class="form-control" readonly="readonly" placeholder="nama barang">
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
	     <br>
	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>
	</div>
</div>
