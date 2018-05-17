<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17
 * Time: 14:28
 */

namespace backend\models;


class BaseLogic
{
    /**
     * 获取用户session信息
     */
    public function getSession()
    {
        $session = \Yii::$app->session;
        return $session->get('userinfo');
    }

}