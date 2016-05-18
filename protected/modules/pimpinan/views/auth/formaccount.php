<?php
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title='Ubah Akun';
$this->params['header']=$this->title;
$this->params['subheader']="Form ".$this->title;
$this->params['breadcrumbs']=["ubah akun"];
?>
<div class="row">
	<div class="col-md-6">
		<?php 
        if(Yii::$app->session->hasFlash('true'))
        {
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-check"></i> <?= Yii::$app->session->getFlash('true') ?>
            </div>
            <?php
        }
        $form = ActiveForm::begin([
	        'id' => 'account-form',
	    ]); ?>
        <?= $form->errorSummary($model); ?>
        <?= $form->field($model, 'username')->textInput(['placeholder' => 'Username','autocomplete'=>'off']) ?>
        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password','autocomplete'=>'off']) ?>
        <?= $form->field($model, 'username_baru')->textInput(['placeholder'=>'Username Baru','autocomplete'=>'off']) ?>
        <?= $form->field($model, 'password_baru')->passwordInput(['placeholder'=>'Password Baru','autocomplete'=>'off']) ?>
        <div class="row">
        	<div class="col-lg-12">
            	<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Update</button>
        	</div>
        </div>
	    <?php ActiveForm::end(); ?>
	</div>
</div>