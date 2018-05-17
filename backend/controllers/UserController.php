<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/16
 * Time: 17:23
 */

namespace backend\controllers;

use backend\models\DepartmentLogic;
use backend\models\RoleLogic;
use common\models\User;
use Yii;
use backend\models\UserLogic;

class UserController extends BaseController
{
    /**
     * 用户列表
     */
    public function actionIndex()
    {
        $session = $this->getSession();
        $info = $info = UserLogic::getUserInfo($session);
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
        $session = $this->getSession();
        if (Yii::$app->request->post()) {

            $info = Yii::$app->request->post();
            $count = User::find()->where(['username' => $info['username']])->count();

            if ($count > 0) {
                returnJsonInfo('账号已存在！',300);
            }

            //如果当前用户级别是超级管理员 获取部门信息  否则默认为自己部门
            if ($session['level'] >= 9){
                $arrDepar = explode(',',$info['department']);
                $info['departmentId'] = $arrDepar[0];
                $info['departmentName'] = $arrDepar[1];
            }else {
                $info['departmentId'] = $session['departmentId'];
                $info['departmentName'] = $session['departmentName'];
            }

            if (UserLogic::add($info,$session['level'])) {
                returnJsonInfo('录入成功！');
            } else {
                returnJsonInfo('录入失败！',300);
            }
        }
        //部门信息
        $department = null;
        //角色信息
        $role =  RoleLogic::getRoleInfo();

        if($session['level'] >= 9) {
            $department = DepartmentLogic::getDeparmentInfo();
        }

        $data = [
            'department' => $department,
            'role' => $role
        ];

        return $this->renderPartial('add',$data);
    }
}