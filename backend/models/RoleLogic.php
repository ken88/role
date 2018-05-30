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
        $roleSql = Role::find()->where("path like '{$session['rolePath']}%'");
        return $roleSql->asArray()->all();
    }

}