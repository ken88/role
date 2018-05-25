<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/24
 * Time: 18:03
 */

namespace backend\models;

use common\models\China;

class ProvincesLogic
{
    /**
     * 获取省
     */
    public static function getProvinces() {
        return China::find()->where('Pid = 0')->asArray()->all();
    }

    /**
     * 获取市
     * @param $provinceid 省id
     */
    public static function getCites($id)
    {
        return China::find()->where(['Pid'=>$id])->asArray()->all();
    }
}