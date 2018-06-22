<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/20
 * Time: 13:29
 */

namespace backend\models;

use Yii;
use common\models\Enterandperson;

class EnterAndpersonLogic extends BaseLogic
{

    /**
     * 获取企业id
     * @param $userId 用户id
     * @return array|\yii\db\ActiveRecord[] 企业id结果集
     */
    public static function getPersionIds($userId)
    {
        $enterpriseIds = Enterandperson::find()
            ->select('distinct(enterpriseId)')
            ->where(['personId' => $userId])
            ->indexBy('enterpriseId')
            ->asArray()
            ->all();
        return $enterpriseIds;
    }

    /**
     * @param $persionIds 负责人id集合
     * @param $userId 创建人id
     * @param $enterId 企业id
     */
    public static function adds($persionIds,$userId,$enterId)
    {
        Enterandperson::deleteAll(['enterpriseId'=>$enterId]);
        $db = Yii::$app->db;
        $query = 'insert into enterAndperson (enterpriseId,userId,personId) VALUES ';
        $queryInsert = null;
        foreach ($persionIds as $v) {
            $queryInsert .= "($enterId,$userId,$v),";
        }
        $sql = $query.rtrim($queryInsert,',');
        return $db->createCommand($sql)->execute();
    }
}