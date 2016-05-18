<?php
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
$this->title='Admin';
?>
<div class="login-box">
    
    <div class="login-logo">
        <a href="<?= Yii::$app->urlManager->createurl(['/']) ?>"><b>Log In Sistem</b></a>
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

	    <?php $form = ActiveForm::begin([
	        'id' => 'login-form',
	    ]); ?>
	        <?= $form->errorSummary($model); ?>
	        <?= $form->field($model, 'username')->textInput(['placeholder' => 'Username','autocomplete'=>'off'])->label(false) ?>
	        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password','autocomplete'=>'off'])->label(false) ?>
	        <?= $form->field($model,'akses')->dropDownList([1=>'Administrator',2=>'Supervisor',3=>'Pimpinan'],['prompt'=>'-- hak akses --'])->label(false); ?>
	        <div class="row">
	        	<div class="col-lg-12">
	            	<button type="submit" class="btn btn-primary btn-block btn-flat">Log In <i class="fa fa-sign-in"></i></button>
	        	</div>
	        </div>
	    <?php ActiveForm::end(); ?>
	</div>

</div>