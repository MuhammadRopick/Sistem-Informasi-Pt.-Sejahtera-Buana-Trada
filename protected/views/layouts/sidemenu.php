<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?= Html::img(Url::base().'/assets/img/avatar3.png',['class'=>'img-circle','alt'=>'teller']) ?>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->name; ?></p>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php
            if($this->context->module->id=="admin")
            {
                ?>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl([$this->context->module->id.'/user']) ?>">
                        <i class="fa fa-user"></i> <span>User</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl([$this->context->module->id.'/supplier']) ?>">
                        <i class="fa fa-truck"></i> <span>Supplier</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl([$this->context->module->id.'/jeniskendaraan']) ?>">
                        <i class="fa fa-motorcycle"></i> <span>Jenis Kendaraan</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl([$this->context->module->id.'/pelanggan']) ?>">
                        <i class="fa fa-users"></i> <span>Pelanggan</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl([$this->context->module->id.'/mekanik']) ?>">
                        <i class="fa fa-cog"></i> <span>Mekanik</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl([$this->context->module->id.'/barang']) ?>">
                        <i class="fa fa-list"></i> <span>Data Barang</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl([$this->context->module->id.'/transaksiservice']) ?>">
                        <i class="fa fa-random"></i> <span>Transaksi Service</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl([$this->context->module->id.'/laporan']) ?>">
                        <i class="fa fa-file-o"></i> <span>Laporan</span>
                    </a>
                </li>
                <?php
            }
            elseif($this->context->module->id=="pimpinan")
            {
                ?>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl([$this->context->module->id.'/laporan']) ?>">
                        <i class="fa fa-file-o"></i> <span>Laporan</span>
                    </a>
                </li>
                <?php
            }
            elseif($this->context->module->id=="supervisor")
            {
                ?>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl([$this->context->module->id.'/barangorder']) ?>">
                        <i class="fa fa-list"></i> <span>Order Barang</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl([$this->context->module->id.'/baranghabispakai']) ?>">
                        <i class="fa fa-square-o"></i> <span>Barang Habis Pakai</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl([$this->context->module->id.'/eoq']) ?>">
                        <i class="fa fa-code"></i> <span>EOQ</span>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </section>
</aside>