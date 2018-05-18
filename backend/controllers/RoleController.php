<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15
 * Time: 13:04
 */

namespace backend\controllers;

use common\models\Role;
use Yii;


class RoleController extends BaseController
{
    /**
     * 角色列表
     */
    public function actionIndex()
    {
        $data['info'] = Role::find()->orderBy('id desc')->asArray()->all();
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
            $session = $this->getSession();
            $role = new Role();
            $role->uid = $session['id'];
            $role->departmentId = $session['departmentId'];
            $role->roleName = $info['roleName'];
            if ($role->save()) {
                returnJsonInfo('录入成功！');
            } else {
                dd($role->getFirstErrors());
                returnJsonInfo('录入失败！',300);
            }
        }

        return $this->renderPartial('add');
    }
}