<?php
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);

$this->beginPage()
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <?php
    if($this->context->module->id=="admin")
    {   
        $head="Administrator";
    }
    elseif($this->context->module->id=="pimpinan")
    {
        $head="Pimpinan";
    }
    else
    {
        $head="Supervisor";
    }
    ?> 
    <title><?= Html::encode($this->title) ?> - <?= $head ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<?php $this->beginBody() ?>
	    <div class="wrapper">
	    	<?= $this->render('header') ?>
	    	<?= $this->render('sidemenu') ?>

	    	<div class="content-wrapper">
	    		<section class="content-header">
			      	<h1>
			        	<?= isset($this->params['header']) ? $this->params['header'] : ''; ?><br>
			          	<small><?= isset($this->params['subheader']) ? $this->params['subheader'] : ''; ?></small>
			      	</h1>
			      	<?= Breadcrumbs::widget([
	        			'homeLink'=>['label'=>'Home','url'=>Yii::$app->urlManager->createUrl(['admin'])],
            			'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        			]) ?>
			    </section>

			    <section class="content">
			    	<div class="box box-default">
					    <div class="box-body">
					    	<?= $content ?>
					    </div>
					</div>
			    </section>
	    	</div>

		</div>
  	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>