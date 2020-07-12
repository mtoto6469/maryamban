<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAssetPardakht extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    'css/site.css',
     'css/bootstrap.min.css',


        'css/Content/bootstrap.min.css',
        'css/Content/bootstrap-theme.min.css',
        'css/Content/MdBootstrapPersianDateTimePicker/jquery.Bootstrap-PersianDateTimePicker.css',


    ];
    public $js = [


        'js/Scripts/bootstrap.min.js',
        'js/Scripts/datepicker.js',

        'js/Scripts/MdBootstrapPersianDateTimePicker/jalaali.js',
        'js/Scripts/MdBootstrapPersianDateTimePicker/jquery.Bootstrap-PersianDateTimePicker.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
