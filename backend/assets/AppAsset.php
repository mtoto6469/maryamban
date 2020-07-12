<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/Content/bootstrap-theme.min.css',
        'css/Content/MdBootstrapPersianDateTimePicker/jquery.Bootstrap-PersianDateTimePicker.css',
        'css/Content/MdBootstrapPersianDateTimePicker/jquery.Bootstrap-PersianDateTimePicker.css',

        'css/site.css',
        'vendors/bootstrap/dist/css/bootstrap.min.css',
        'vendors/font-awesome/css/font-awesome.min.css',
        'css/jquery-jvectormap-2.0.3.css',
        'css/nprogress.css',
        'css/custom-rtl.css',
        'css/new.css',
        'css/viewfactor.css',

        'css/css/bootstrap.min.css',
       'css/bootstrap-datepicker.min.css',
       

    ];
    public $js = [

        'vendors/bootstrap/dist/js/bootstrap.min.js',
        'build/js/custom.min.js',
        'js/site.js',


        'js/upload-img.js',

        'js/bootstrap-datepicker.min.js',
        'js/bootstrap-datepicker.fa.min.js',
        'js/datepicker.js',

        

        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
