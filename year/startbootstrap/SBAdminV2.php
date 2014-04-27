<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-4-25
 * Time: 下午10:50
 */

namespace year\startBootstrap;

use yii\web\View ;
use yii\web\AssetBundle;

class SBAdminV2 extends AssetBundle
{
    // The files are not web directory accessible, therefore we need
    // to specify the sourcePath property. Notice the @vendor alias used.
    public $sourcePath = '@year/startBootstrap/sb-admin-v2';
    public $css = [
       //  'css/bootstrap.min.css',
        'font-awesome/css/font-awesome.css',
        'css/sb-admin.css',
    ];

    public $js = [
       //  'js/bootstrap.min.js',
        'js/plugins/metisMenu/jquery.metisMenu.js',
        'js/sb-admin.js',
    ];


    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',

        'yii\bootstrap\BootstrapAsset',
    ];
}