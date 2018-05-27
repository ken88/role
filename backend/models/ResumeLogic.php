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
use Yii;

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

    /**
     *批量导入 录入数据
     */
    public static function add($res)
    {
        $session = \Yii::$app->session['userinfo'];
        $db = Yii::$app->db;
        $query = 'INSERT INTO resume (uid,departmentId,level,userName,phone,age,sex,xueLi) VALUES ';
        $queryInsert = null;
        foreach ($res as $val) {
            $sex = $val['D'] == '男' ? 1 : 0;
            $queryInsert .= "({$session['id']},{$session['departmentId']},{$session['level']},'{$val['A']}', '{$val['B']}', {$val['C']}, {$sex},'{$val['E']}'),";
        }
        $sql = $query.rtrim($queryInsert,','). ' ON DUPLICATE KEY UPDATE 
        `phone` = VALUES(`phone`)';
        return $db->createCommand($sql)->execute();

    }

}