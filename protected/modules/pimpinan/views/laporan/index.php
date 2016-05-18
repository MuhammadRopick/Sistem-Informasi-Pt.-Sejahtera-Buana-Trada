<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Laporan';
$this->params['header']=$this->title;
$this->params['subheader']="Form ".$this->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-md-6">
		<?php
		$form = ActiveForm::begin(['action'=>'laporan/proses','options'=>['target'=>'_blank']]); ?>
		<label for="data">Data</label>
		<select name="data" id="data" class="form-control" required>
			<option value="">-- pilih jenis data --</option>
			<option value="1">Transaksi Service</option>
			<option value="2">Order Barang</option>
		</select>
		<label for="bulan">Bulan</label>
		<select name="bulan" id="bulan" class="form-control" required>
			<option value="">-- pilih Bulan --</option>
			<?php
			foreach($bulan as $k => $b)
			{
				?> <option value="<?= $k ?>"><?= ucfirst($b) ?></option><?php
			}
			?>
		</select>
		<label for="tahun">Tahun</label>
		<select name="tahun" id="tahun" class="form-control" required>
			<option value="">-- pilih Tahun --</option>
			<?php
			foreach(range(2010,date('Y')) as $b)
			{
				?> <option value="<?= $b ?>"><?= $b ?></option><?php
			}
			?>
		</select>
		<br>
		<input type="submit" class="btn btn-flat btn-primary" value="Proses">
		<?php ActiveForm::end() ?>
	</div>
</div>