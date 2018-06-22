<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/19
 * Time: 16:20
 */

namespace backend\models;

use yii\data\Pagination;
use common\models\Enterprise;
use backend\models\EnterAndpersonLogic;

class EnterpriseLogic extends BaseLogic
{
    /**
     * 企业信息
     * @param string $keyWord 搜索条件
     * @return array
     */
    public static function getInfo($keyWord = '')
    {
        $session = self::getSession();

        //获取自己创建的企业与被分配的企业id
        $enterIds = EnterAndpersonLogic::getPersionIds($session['id']);
        $enterIds = array_keys($enterIds);
        $enterIds = rtrim(implode(',',$enterIds));
        $where = "(path like '{$session['path']}%' ";

        $where .= $enterIds != '' ? " or id in ($enterIds) )" : ')';

        $clum = 'id,name,signProvince,projectGrade,signCity,legalEntity,projectStatus,personNames,userName,createTime';

        $query = Enterprise::find()->select($clum)->where(" $where $keyWord");
//echo $query->createCommand()->getRawSql();exit;
        // 总数
        $count = $query->count();

        // 使用总数来创建一个分页对象
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 20]);

        $info = $query->offset($pagination->offset)
            ->limit($pagination->limit)->orderBy('id desc')->asArray()->all();
        $data = [
            'info' => $info,
            'pages' => $pagination,
        ];
        return $data;
    }

}