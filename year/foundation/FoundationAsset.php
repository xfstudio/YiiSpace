<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-7-26
 * Time: 下午10:04
 */

namespace year\foundation;


class FoundationAsset extends AssetBundle
{

    /**
     * @var array
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'year\foundation\ModernizrAsset',
    ];

    /**
     * Initializes the bundle.
     * If you override this method, make sure you call the parent implementation in the last.
     */
    public function init()
    {

        $this->css =
            (true == $this->debug) ?
                [
                    'css/foundation.css',
                ] :
                [
                    'css/foundation.min.css',
                ];

        /**
         * FIXME do you need load the js file depends on the DEBUG mode or not ？
         */
        $this->js = [
                'js/foundation.min.js',
        ];
        parent::init();
    }

} 