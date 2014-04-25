<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-4-25
 * Time: 上午4:01
 */

namespace app\assets;

use yii\web\AssetBundle;
class FontAwesomeAsset extends AssetBundle
{
    // The files are not web directory accessible, therefore we need
    // to specify the sourcePath property. Notice the @vendor alias used.
    public $sourcePath = '@vendor/fortawesome/font-awesome';
    public $css = [
        'css/font-awesome.css',
    ];
}