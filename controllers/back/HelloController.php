<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-4-27
 * Time: 下午9:34
 */

namespace app\controllers\back;

use yii\web\Controller ;

class HelloController extends Controller{

    public function actionWorld(){
        return 'word';
    }
} 