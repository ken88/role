<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/23
 * Time: 16:21
 */

namespace backend\models;

use common\models\Resumecategory;

class ResumeCategoryLogic
{

    /**
     *  获取岗位分类
     * @param $pid 父级id
     */
    public static function getAll($pid)
    {
        return Resumecategory::find()->where(['pid' => $pid])->asArray()->all();
    }
}