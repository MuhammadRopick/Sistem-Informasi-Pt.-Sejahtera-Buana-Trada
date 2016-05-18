<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<header class="main-header">
    <a href="<?= Yii::$app->urlManager->createUrl([$this->context->module->id]) ?>" class="logo">
        <?php
        if($this->context->module->id=="admin")
        {   
            $logomn="ADM";
            $logotxt="Administrator";
        }
        elseif($this->context->module->id=="pimpinan")
        {
            $logomn="PMN";
            $logotxt="Pimpinan";
        }
        else
        {
            $logomn="SPR";
            $logotxt="Supervisor";
        }
        ?> 
        <span class="logo-mini"><b><?= $logomn ?></b></span>
        <span class="logo-lg"><?= $logotxt ?></span>
    
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?= Html::img(Url::base().'/assets/img/avatar3.png',['class'=>'user-image','alt'=>'teller']) ?>
                        <span class="hidden-xs"><?= Yii::$app->user->identity->name; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <?= Html::img(Url::base().'/assets/img/avatar3.png',['class'=>'img-circle','alt'=>'teller']) ?>
                            <p>
                                <?= ucfirst(Yii::$app->user->identity->name); ?> - Administrator
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= Yii::$app->urlManager->createUrl([$this->context->module->id.'/auth/account']) ?>" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Ubah Akun</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= Yii::$app->urlManager->createUrl([$this->context->module->id.'/auth/logout']) ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>