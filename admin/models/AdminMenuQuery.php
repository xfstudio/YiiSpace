<?php
/**
 * Created by PhpStorm.
 * User: yiqing
 * Date: 14-4-30
 * Time: 下午2:48
 */

namespace admin\models;

use yii\db\ActiveQuery ;
use creocoder\behaviors\NestedSetQuery ;

class AdminMenuQuery extends ActiveQuery
{
    public function behaviors() {
        return [
            [
                'class' => NestedSetQuery::className(),
            ],
        ];
    }
}