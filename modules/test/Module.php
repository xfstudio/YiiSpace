<?php

namespace modules\test;

use Yii ;
use yii\base\Event;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'modules\test\controllers';

    public function init()
    {
        parent::init();


       //die($this->controllerNamespace);
        // Raise onModuleCreate event
        $event = new Event() ;
        $event->sender = $this ;
        Yii::$app->onModuleCreate($event);

        /*
        Yii::setAlias('@testModule',__DIR__);
        die( Yii::getAlias('@testModule') );
        // 修改下 theme的映射

        /*
        Yii::$app->set('view', [
            'class' => 'yii\web\View',
            'title' => '2amigOS! Consulting Group LLC',
            'theme' => [
                // 'baseUrl' => '@web/themes/mobile',
                // 'basePath' => '@app/themes/mobile'
                'pathMap' => ['@testModule/views' => '@testModule/themes/basic'],
            ]
        ]);
        /*
//        print_r(Yii::$app->view->theme->pathMap); die(__METHOD__);
        */
    }
}
