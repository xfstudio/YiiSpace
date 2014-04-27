<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-4-27
 * Time: 下午3:06
 */

namespace year\widgets;

use yii\web\AssetBundle;

// use yii\web\JqueryAsset ;

class JsTreeAsset extends AssetBundle
{
    public $sourcePath = '@year/widgets/assets/jsTree';
    public $js = [
        'dist/jstree.min.js',
    ];
    public $css = [
        'dist/themes/default/style.min.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}