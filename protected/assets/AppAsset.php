<?php
namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $sourcePath="@app/../source";
    public $css = [
        'css/bootstrap.css',
        'plugins/fontawesome/css/font-awesome.css',
        'css/template.css',
        'css/skins/_all-skins.min.css',
        'plugins/icheck/skins/square/blue.css',
        'css/app.css'
    ];
    public $js = [
        'js/bootstrap.js',
        'plugins/slimscroll/slimscroll.js',
        'plugins/fastclick/fastclick.js',
        'plugins/icheck/icheck.js',
        'js/template.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
