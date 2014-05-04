<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

/** @var Composer\Autoload\ClassLoader() $loader */
$loader =  require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/back.php');

// 设置后台程序专用的根别名
$appPath =  ($config['basePath']) ;
Yii::setAlias('@admin',$appPath . DIRECTORY_SEPARATOR .'admin') ;
// die(Yii::getAlias('@admin'));

// $app = (new yii\web\Application($config));
$app = (new admin\web\Application($config));

//Yii::setAlias('@admin',Yii::getAlias('@app/admin'));

Yii::setAlias('@year',Yii::getAlias('@app/year')) ;
Yii::setAlias('@modules',Yii::getAlias('@app/modules')) ;
$app->runEnd('back');
