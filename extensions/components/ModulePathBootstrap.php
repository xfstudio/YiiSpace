<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-4-23
 * Time: 上午12:48
 * @see http://www.ramirezcobos.com/2014/03/22/how-to-use-bootstrapinterface-yii2/
 */

namespace app\extensions\components;

use Yii ;
use yii\base\Module ;
use yii\base\Application;
use yii\base\BootstrapInterface;

// used by WebApplicationEndBehavior class
use yii\base\Behavior;
use yii\base\Event;

/**
 * support the front back end feature as yii1.x
 *
 * Class ModulePathBootstrap
 * @package app\extensions\components
 */
class ModulePathBootstrap implements BootstrapInterface
{

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        // TODO: Implement bootstrap() method.
        $app->attachBehavior('changeModulePaths', new WebApplicationEndBehavior());

    }
}

/**
 * https://github.com/yiisoft/yii2/blob/master/docs/guide/behaviors.md
 *
 * attach behavior to component :
 * ~~~
 *   'myComponent' => [
        // ...
        'as tree' => [
            'class' => 'Tree',
            'root' => 0,
          ],
        ],
 * ~~~
 * Class WebApplicationEndBehavior
 * @package app\extensions\components
 */
class WebApplicationEndBehavior extends Behavior
{

    const  EVENT_CHANGE_MODULE_PATH = 'changeModulePaths';

    // Web application end's name.
    private $_endName;

    // Getter.
    // Allows to get the current -end's name
    // this way: Yii::app()->endName;
    public function getEndName()
    {
        return $this->_endName;
    }

    // Run application's end.
    public function runEnd($name)
    {
        $this->_endName = $name;

        // Attach the changeModulePaths event handler
        // and raise it.
        Yii::$app->on(self::EVENT_CHANGE_MODULE_PATH, [$this, 'changeModulePaths']);
        //  $this->onModuleCreate = array($this, 'changeModulePaths');
        $this->owner->trigger(self::EVENT_CHANGE_MODULE_PATH, new Event(array('sender' => $this->owner)));

        $this->owner->run(); // Run application.
    }


    // This event should be raised when Application
    // or Module instances are being initialized.
    /**
     * @param Event $event
     */
    public function onModuleCreate($event)
    {
        $this->owner->trigger(self::EVENT_CHANGE_MODULE_PATH, $event);
    }

    // onModuleCreate event handler.
    // A sender must have controllerPath and viewPath properties.
    public  function changeModulePaths(Event $event)
    {
        /** @var   Application|Module $app   */
        $appOrModule = $event->sender ;

        // custom initialization code goes here
        $appEnd = Yii::$app->getEndName() ;
        $appOrModule->controllerNamespace = str_replace('\controllers', sprintf('\controllers\%s',$appEnd),$appOrModule->controllerNamespace);

        $appOrModule->viewPath .= DIRECTORY_SEPARATOR.$this->_endName;

        // die( $appOrModule->controllerNamespace) ;
        /*
        if($appOrModule instanceof Application){
            echo $appOrModule->getViewPath() ;

           // $appOrModule->controllerPath .= DIRECTORY_SEPARATOR.$this->_endName;
            $appOrModule->viewPath .= DIRECTORY_SEPARATOR.$this->_endName;
        }else{
            // $appOrModule->controllerPath .= DIRECTORY_SEPARATOR.$this->_endName;
            $appOrModule->viewPath .= DIRECTORY_SEPARATOR.$this->_endName;
            print_r($appOrModule->viewPath); die ;
        }



        /*
        $event->sender->controllerPath .= DIRECTORY_SEPARATOR.$this->_endName;
        $event->sender->viewPath .= DIRECTORY_SEPARATOR.$this->_endName;

        // modify for support the theme characteristic
        /*
         if ( !empty($event->sender->theme ))
             $event->sender->viewPath = $event->sender->theme->basePath.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$this->_endName;

        if ( !empty(Yii::app()->theme ) && $event->sender instanceof CWebApplication){
            $event->sender->viewPath = $event->sender->theme->basePath.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$this->_endName;
        }elseif(!empty(Yii::app()->theme )){
            $event->sender->viewPath = Yii::app()->theme->basePath.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$event->sender->getId() .DIRECTORY_SEPARATOR.$this->_endName;
        }

        */
    }
}
