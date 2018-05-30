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
        $data = $info = UserLogic::getUserInfo($session);
        $moduleId = Yii::$app->request->get('moduleId',0);
        //获取权限按钮信息
        $aclList = $this->getButAcl($moduleId);
        $data['aclList'] = $aclList;

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

    /**
     * 编辑
     */
    public function actionEdit()
    {
        $session = $this->getSession();
        $userId = Yii::$app->request->get('id',Yii::$app->request->post('id'));
        $user = User::find()->where(['id' => $userId])->one();
        if (Yii::$app->request->post()) {
            $info = Yii::$app->request->post();

            //如果当前用户级别是超级管理员 获取部门信息  否则默认为自己部门
            if ($session['level'] >= 9){
                $arrDepar = explode(',',$info['department']);
                $info['departmentId'] = $arrDepar[0];
                $info['departmentName'] = $arrDepar[1];
            }else {
                $info['departmentId'] = $session['departmentId'];
                $info['departmentName'] = $session['departmentName'];
            }
            $arrRole = explode(',',$info['role']);
            $user->departmentId = $info['departmentId'];
            $user->departmentName = $info['departmentName'];
            $user->realName = $info['realName'];
            $user->roleId = $arrRole[0];
            $user->roleName = $arrRole[1];

            if ($user->save()) {
                returnJsonInfo('操作成功！');
            }else {
                returnJsonInfo('操作失败！',300);
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
            'role' => $role,
            'info' => $user
        ];
        return $this->renderPartial('edit',$data);
    }

    /**
     * 删除
     */
    public function actionDelete()
    {
        $userId = Yii::$app->request->get('id',0);
        if(User::findOne($userId)->delete()) {
            returnJsonInfo('删除成功！');
        }
        returnJsonInfo('删除失败！',300);
    }

    /**
     * 密码修改
     */
    public function actionPass()
    {
        if (Yii::$app->request->post()) {
            $session = $this->getSession();
            $info = Yii::$app->request->post();
            if ($info['newPass'] != $info['newPass1']) {
                returnJsonInfo('两次密码不一致！',300);
            }
            $user = User::find()->where(['username'=>$session['username']])->one();
           if (md5($info['password']) != $user->password) {
               returnJsonInfo('原始密码不正确！',300);
           }else {
                $user->password = md5($info['newPass']);
                if ($user->save()) {
                    returnJsonInfo('修改成功！');
                }else {
                    returnJsonInfo('修改失败！',300);
                }
           }
        }
        return $this->renderPartial('pass');
    }
}