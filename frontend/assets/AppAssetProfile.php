<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAssetProfile extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//    'css/site.css',


//   'css/components.css',
//    'css/icons.css',
//    'css/responsee.css',
//    'owl-carousel/owl.carousel.css',
//    'owl-carousel/owl.theme.css',
//    'css/profile.css',
//   'css/template-style.css',
    'css/main.82cfd66e.css',
        "css/ami/amir.css",
        'css/newpro.css',
        'css/bootstrap-rtl.css',
        'css/seting1.css',
        'css/seting2.css',
        'css/seting3.css',
        'css/replace.css',




    ];
    public $js = [

        'js/main.85741bff.js',
        'js/seting.js',
        'js/seting1.js',
        'js/seting2.js',
        'js/seting3.js',
        'js/seting4.js',
        'js/seting5.js',
        'js/seting6.js',

//        ,'js/jquery-1.8.3.min.js',
//     'js/jquery-ui.min.js',
//     'js/responsee.js',
//     'owl-carousel/owl.carousel.js',
//        'js/proflie.js'

  
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
