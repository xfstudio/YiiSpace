<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-7-26
 * Time: 下午10:41
 */

namespace year\foundation;

// use yii\web\AssetBundle ;

class AssetBundle extends \yii\web\AssetBundle {


    /**
     * @var bool
     */
    public $debug = YII_DEBUG ;


    /**
     *
     */
    public function init(){
        $defaultSourcePath = __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'foundation-5.3.1';
        $this->setSourcePath($defaultSourcePath);

        parent::init() ;
    }

    /**
     * Sets the source path if empty
     *
     * @param string $path the path to be set
     */
    protected function setSourcePath($path)
    {
        if (empty($this->sourcePath)) {
            $this->sourcePath = $path;
        }
    }

} 