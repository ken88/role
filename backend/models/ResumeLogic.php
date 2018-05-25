<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/23
 * Time: 16:21
 */

namespace backend\models;

use yii\data\Pagination;
use common\models\Resume;

class ResumeLogic
{
    public static function getInfo()
    {
        $clum = 'id,userName,sex,age,xueLi,phone,isMiHao,rcName1,rcName2,qiWangXinZi,qiWangDiDian,juZhuDiZhi,createTime';

        $query = Resume::find()->select($clum);
        // 总数
        $count = $query->count();

        // 使用总数来创建一个分页对象
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 20]);

        $info = $query->offset($pagination->offset)
            ->limit($pagination->limit)->asArray()->all();
        $data = [
            'info' => $info,
            'pages' => $pagination,
        ];
        return $data;

    }

}