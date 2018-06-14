<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/14
 * Time: 15:44
 */

namespace backend\models;

use common\models\Log;

class LogLogic
{
    public static function addLog()
    {
        $session = \Yii::$app->session;
        $info = $session[''];
    }
}