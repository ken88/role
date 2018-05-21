<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17
 * Time: 9:33
 */
namespace backend\models;

use common\models\Department;
use yii\data\Pagination;

class DepartmentLogic
{
    /**
     * 部门首页
     */
    public static function getDepartmentAll()
    {
        $query  = Department::find();
        // 总数
        $count = $query->count();

        // 使用总数来创建一个分页对象
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=> 20]);
        // 使用分页对象来填充 limit 子句并取得数据
        $info = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->asArray()
            ->all();
        $data = [
            'info'=> $info,
            'pages' => $pagination,
        ];
        return $data;
    }
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