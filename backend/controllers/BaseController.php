<?php
/**
 * Created by PhpStorm.
 * User: yukai
 * Date: 2018/4/9
 * Time: 14:19
 */

namespace backend\controllers;


use yii\web\Controller;

class BaseController extends Controller
{
    public $enableCsrfValidation = false;
    public function init()
    {
        parent::init();
        $session = \Yii::$app->session;
        $user = $session->get('userinfo');
        if (empty($user)) {
            $this->redirect('/site/login');
        }
    }

    /**
     * 获取用户session信息
     */
    public function getSession()
    {
        $session = \Yii::$app->session;
        return $session->get('userinfo');
    }

}