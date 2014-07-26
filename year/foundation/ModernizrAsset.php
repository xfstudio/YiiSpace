<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-7-26
 * Time: 下午10:20
 */

namespace year\foundation;


class ModernizrAsset extends AssetBundle {


    public function init(){
        $this->js = [
            'js/vendor/modernizr.js'
        ];
        $this->jsOptions = [
            'position' => \yii\web\View::POS_HEAD,
        ];
        parent::init();
    }
} 