<?php
use yii\helpers\Url;
$this->title = 'HOME';
?>
<style type="text/css">
	.border
	{
		border:1px solid red;
	}
</style>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="col-md-8 col-md-offset-2 border" style="margin-top:50px;">
			<center><h2 style="font-weight:bolder;">PT. SEJAHTERA BUANA TRADA</h2></center>
			<div class="row">
				<div class="col-md-4 border">
					<div class="list-group">
  						<a href="<?= Url::to(['loginadmin']) ?>" class="list-group-item <?= (Yii::$app->controller->action->id=="index" || Yii::$app->controller->action->id=="loginadmin") ? "active" : "" ?>">Administrator</a>
				  		<a href="<?= Url::to(['loginpimpinan']) ?>" class="list-group-item <?= (Yii::$app->controller->action->id=="loginpimpinan") ? "active" : "" ?>">Pimpinan</a>
				  		<a href="<?= Url::to(['loginsupervisor']) ?>" class="list-group-item <?= (Yii::$app->controller->action->id=="loginsupervisor") ? "active" : "" ?>">Supervisor</a>
					</div>
				</div>
				<div class="col-md-8 border">
				<?= Yii::$app->controller->action->id ?>
				</div>
			</div>
		</div>
	</div>
</div>