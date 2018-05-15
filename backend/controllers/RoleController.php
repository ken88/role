<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15
 * Time: 13:04
 */

namespace backend\controllers;

use Yii;


class RoleController extends BaseController
{
    /**
     * 角色列表
     */
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }

    /**
     * 新增
     */
    public function actionAdd()
    {
        if (Yii::$app->request->post()) {
            $info = Yii::$app->request->post();

        }

        return $this->renderPartial('add');
    }
}