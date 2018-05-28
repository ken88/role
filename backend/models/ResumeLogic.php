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

class ResumeLogic extends BaseLogic
{
    public static function getInfo($isGongHai = 0,$keyWord = '')
    {
        $session = self::getSession();
        $level = $session['level'];
        $clum = 'id,userName,sex,age,xueLi,phone,isMiHao,rcName1,rcName2,qiWangXinZi,qiWangDiDian,juZhuDiZhi,createTime';

        $query = Resume::find()->select($clum)->where($keyWord)->andWhere(['isGongHai'=>$isGongHai]);

        if ($level < 9) {
            if ($isGongHai == 0) {
                $query = $query->andWhere(['departmentId' => $session['departmentId']]);
            }
            $query = $query->andWhere(['<=', 'level', $level]);
        } else if ($level == 9) {
            $query = $query->andWhere(['<=', 'level', $level]);
        }
//        echo $query->createCommand()->getRawSql();exit;
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
            $sex = $val['D'] == '男' ? 1 : 2;
            $age = $val['C'] == '' ? 0 : $val['C'];
            $queryInsert .= "({$session['id']},{$session['departmentId']},{$session['level']},'{$val['A']}','{$val['B']}', {$age}, {$sex},'{$val['E']}'),";
        }
        $sql = $query.rtrim($queryInsert,','). ' ON DUPLICATE KEY UPDATE 
        `phone` = VALUES(`phone`)';

        return $db->createCommand($sql)->execute();

    }

}