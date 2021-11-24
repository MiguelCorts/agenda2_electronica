<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        //'plantilla2/css/bootstrap.min.css',
        'plantilla2/css/font-awesome.min.css',
        'plantilla2/css/magnific-popup.css',
        'plantilla2/css/slick.css',
          'plantilla2/css/style.css',





    ];
    public $js = [


'plantilla2/js/app.js',
'plantilla2/js/bootstrap.min.js',
'plantilla2/js/circle.js',
'plantilla2/js/counter.js',
'plantilla2/js/custom.js',
'plantilla2/js/jquery.filterizr.min.js',
'plantilla2/js/jquery.magnific-popup.min.js',
'plantilla2/js/slick.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
