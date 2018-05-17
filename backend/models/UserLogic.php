<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17
 * Time: 14:16
 */

namespace backend\models;

use common\models\User;
class UserLogic
{
    public static function getUserInfo($session)
    {
        /**
         * 超级管理员 level 10
         * 管理员 9
         * 下面的按照部门不同级别进行不同数据展示 例如 总监查看本部门所有信息  个人查看个人信息
         */
        $userSql = User::find();

        $level = $session['level'];
        //级别小于9 的 按照部门级别查看数据
        if ($level < 9) {
            $userSql = $userSql
                ->where(['departmentId' => $session['departmentId']])
                ->andWhere(['<=' , 'level', $level]);
        }

        return $userSql->asArray()->all();
    }

    /**
     * @param $info  array 录入信息
     * @param $level Internet 级别
     * @return bool 返回信息
     */
    public static function add($info,$level)
    {
        $arrRole = explode(',',$info['role']);
        $user = new User();
        $user->username = $info['username'];
        $user->password = md5(123456);
        $user->departmentId = $info['departmentId'];
        $user->departmentName = $info['departmentName'];
        $user->realName = $info['realName'];
        $user->createDate = date('Y-m-d H:i:s');
        $user->level = $level - 1;
        $user->roleId = $arrRole[0];
        $user->roleName = $arrRole[1];
        if ($user->save()) {
            return true;
        }else {
            return false;
        }
    }
}