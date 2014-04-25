<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-4-25
 * Time: 上午12:13
 */

namespace year\purecss;

use Yii ;
use yii\web\AssetBundle ;

$alias = Yii::setAlias('@pureAsset',__DIR__) ;

class PureAsset extends AssetBundle{
    // The files are not web directory accessible, therefore we need
    // to specify the sourcePath property. Notice the @vendor alias used.
    public $sourcePath = '@pureAsset/assets';
    public $css = [
        'css/pure-min.css',
    ];

}