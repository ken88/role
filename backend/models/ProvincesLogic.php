<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/24
 * Time: 18:03
 */

namespace backend\models;

use common\models\China;
use Yii;

class ProvincesLogic
{
    /**
     * 获取省
     */
    public static function getProvinces() {
        $redis = Yii::$app->redis;
        if ($redis->exists('chinaPid0')) {
            $prov = json_decode($redis->get('chinaPid0'),true);
        }else {
            $prov = China::find()->where('Pid = 0')->asArray()->all();
            $redis->set('chinaPid0',json_encode($prov,320));
        }
        return $prov;
    }

    /**
     * 获取市 县
     * @param $provinceid 省id
     */
    public static function getCites($id)
    {
        $redis = Yii::$app->redis;
        if ($redis->exists('pid'.$id)) {
            $city = json_decode($redis->get('pid'.$id),true);
        } else {
            $city = China::find()->where(['Pid'=>$id])->asArray()->all();
            $redis->set('pid'.$id,json_encode($city,320));
        }
        return $city;
    }
}