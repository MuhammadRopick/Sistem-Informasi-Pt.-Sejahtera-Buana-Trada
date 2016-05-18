<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LoginAsset extends AssetBundle
{
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath="@app/../source";
    public $css = [
        'css/bootstrap.css',
        'plugins/fontawesome/css/font-awesome.css',
        'css/template.css',
        //'css/skins/_all-skins.min.css'
    ];
    public $js = [
        'js/bootstrap.js',
        'js/template.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
