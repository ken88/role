<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17
 * Time: 11:03
 */

namespace backend\models;

use common\models\Module;
class ModuleLogic
{
    /**
     * 获取菜单信息
     */
    public static function getModuleInfo()
    {
        $sql = "SELECT *,concat( bpath,'-',id ) as bpaths FROM module ORDER BY bpaths";
        return Module::findBySql($sql)->asArray()->all();
    }
}