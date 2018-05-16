<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/16
 * Time: 17:23
 */

namespace backend\controllers;

use common\models\User;
use Yii;

class UserController extends BaseController
{
    /**
     * 用户列表
     */
    public function actionIndex()
    {
        $info = User::find()->where(['departmentId' => $this->getSession()['departmentId']])->asArray()->all();
        $data = [
            'info' => $info,
        ];
        return $this->renderPartial('index',$data);
    }

    /**
     * 新增
     */
    public function actionAdd()
    {
        if (Yii::$app->request->post()) {
            $info = Yii::$app->request->post();
            $count = Role::find()->where(['roleName' => $info['roleName']])->count();
            if ($count > 0) {
                returnJsonInfo('角色已存在！',300);
            }
            $role = new Role();
            $role->uid = $this->getSession()['id'];
            $role->roleName = $info['roleName'];
            if ($role->save()) {
                returnJsonInfo('录入成功！');
            } else {
                returnJsonInfo('录入失败！',300);
            }
        }

        return $this->renderPartial('add');
    }
}