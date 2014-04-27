<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/back.php');


$app = (new yii\web\Application($config));
Yii::setAlias('@admin',Yii::getAlias('@app/admin'));

Yii::setAlias('@year',Yii::getAlias('@app/year')) ;
Yii::setAlias('@modules',Yii::getAlias('@app/modules')) ;
$app->runEnd('back');
