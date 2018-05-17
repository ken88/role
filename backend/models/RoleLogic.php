<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17
 * Time: 14:25
 */

namespace backend\models;

use common\models\Role;

class RoleLogic extends BaseLogic
{
    public static function getRoleInfo()
    {
        $session = self::getSession();
        /**
         * 超级管理员 level 10
         * 管理员 9
         * 下面的按照部门不同级别进行不同数据展示 例如 总监查看本部门所有信息  个人查看个人信息
         */
        $roleSql = Role::find();
        $level = $session['level'];
        //级别小于9 的 按照部门级别查看数据
        if ($level < 9) {
            $roleSql = $roleSql
                ->where(['departmentId' => $session['departmentId']]);
        }

        return $roleSql->asArray()->all();
    }

}