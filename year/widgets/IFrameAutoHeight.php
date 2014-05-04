<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-4-28
 * Time: 下午4:56
 */

namespace year\widgets;

use yii\web\View ;
use yii\base\Widget ;

class IFrameAutoHeight extends Widget
{

    public function run()
    {
        IFrameAutoHeightAsset::register($this->getView());
    }
}

class IFrameAutoHeightAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@year/widgets/assets/iframeAutoHeight';

    public $js = [
        'jquery.browser.js',
        'jquery.iframe-auto-height.plugin.1.9.3.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

}