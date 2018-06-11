<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/11
 * Time: 10:55
 */

namespace frontend\controllers;


class ApiConntroller
{
    private $token;
    public  function __construct()
    {
        $this->token = \Yii::$app->params['token'];
    }

    /**
     * 获取token
     * @return mixed
     */
    public  function getToken()
    {
        return $this->token;
    }
}