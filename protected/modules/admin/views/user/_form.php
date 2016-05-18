<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6">
        <h4>Silahkan isi form berikut :</h4>
        

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        <?php
        if(Yii::$app->controller->action->id=="update")
        {
            ?>
            <label for="change_pass">Ganti Password ?</label>
            <select name="change_pass" id="change_pass" class="form-control">
                <option value="1">Ya</option>
                <option value="2" selected>Tidak</option>
            </select>
            <div class="field_pass" style="display:none;">
                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'class'=>'my_pass form-control']); ?>
            </div>
            <?php
        }
        else
        {
            echo $form->field($model, 'password')->passwordInput(['maxlength' => true]);
        }
        ?>
        <?= $form->field($model, 'level')->dropDownList(ArrayHelper::map($level,'id','name'), ['prompt' => '-- level --']) ?>
        <div class="form-group">
            <a href="<?= Url::to('index'); ?>" class="btn btn-flat bg-navy "><i class="fa fa-arrow-left"></i> Batal</a>
            <button type="submit" class="btn btn-flat bg-olive"><i class="fa fa-save"></i> <?php echo $model->isNewRecord ? 'Simpan' : 'Update';?></button>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php
$this->registerJs("
            $(function()
            {
                $('#change_pass').change(function()
                {
                    var vl=$(this).val();
                    if(vl==1)
                    {
                        $('.field_pass').show();
                        $('.my_pass').val('');
                        $('.my_pass').attr('required','true');
                    }
                    else
                    {
                        $('.field_pass').hide();
                        $('.my_pass').removeAttr('required');
                    }
                });
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    increaseArea: '50%'
                  });
            });
    ",View::POS_END);