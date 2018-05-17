<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17
 * Time: 9:33
 */
namespace backend\models;

use common\models\Department;

class DepartmentLogic
{
    /**
     *获取部门所有信息
     */
    public static function getDeparmentInfo()
    {
        return Department::find()->orderBy('id desc')->asArray()->all();
    }

    /**
     * @param $departmentName string  部门名
     * @return int|string 返回结果
     */
    public static  function checkDEparmentName($departmentName)
    {
        return Department::find()->where(['departmentName'=> $departmentName])->count();
    }
}