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
use common\models\Resumecategory;

class ResumeLogic extends BaseLogic
{
    /**
     * @param int $isGongHai 1公海 0私有
     * @param string $keyWord 搜索条件
     * @return array
     */
    public static function getInfo($isGongHai = 0,$keyWord = '')
    {
        $session = self::getSession();
        $level = $session['level'];
        $clum = 'id,userName,sex,age,xueLi,phone,isMiHao,rcName1,rcName2,qiWangXinZi,qiWangDiDian,juZhuDiZhi,beiZhu,createTime,uName';

        $query = Resume::find()->select($clum)->where($keyWord)->andWhere(['isGongHai'=>$isGongHai]);

        if ($isGongHai == 0) {
            $query = $query->andWhere("path like '{$session['path']}%'");
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
        $query = 'INSERT INTO resume (uid,departmentId,level,userName,phone,age,sex,xueLi,beizhu,isMiHao,juZhuDiZhi,rcId1,rcName1,rcId2,rcName2,path,qiWangDiDian) VALUES ';
        $queryInsert = null;
        $category = Resumecategory::find()->asArray()->all();
        //地区省
        $sheng = ProvincesLogic::getProvinces();

        foreach ($res as $val) {
            $rcId1 = 0;
            $rcName1 = '';
            $rcId2 = 0;
            $rcName2 = '';
            $qiWangDiZhi = '';
            //城市
            if (!empty($val['K'])) {
                $city = explode('-',$val['K']);
                $pid = 0;
                foreach ($sheng as $s) {
                   if ($s['Name'] == $city[0]) {
                       $qiWangDiZhi = $city[0];
                       $pid = $s['Id'];
                       break;
                   }
                }
                if ($qiWangDiZhi != '' && !empty($city[1])) {
                    $shi = ProvincesLogic::getCites($pid);
                    foreach ($shi as $s) {
                        if ($s['Name'] == $city[1]) {
                            $qiWangDiZhi .= '-'.$city[1];
                            if (!empty($city[2])) {
                                $qiWangDiZhi .= '-'.$city[2];
                            }
                            break;
                        }
                    }
                }
            }
            $sex = $val['D'] == '男' ? 1 : 2;
            $age = $val['C'] == '' ? 0 : $val['C'];
            $isMiHao = $val['G'] == '是' ? 1 : 0;
            //获取1级分类信息
            foreach ($category as $c) {
                if ($c['cName'] == $val['I']) {
                    $rcId1 = $c['id'];
                    $rcName1 = $c['cName'];
                    break;
                }
            }
            //获取2级分类信息
            foreach ($category as $c) {
                if ($c['cName'] == $val['J']) {
                    $rcId2 = $c['id'];
                    $rcName2 = $c['cName'];
                    break;
                }
            }
            $phone = iconv("utf-8","GBK//IGNORE",$val['B']);
            $queryInsert .= "(
            {$session['id']},{$session['departmentId']},{$session['level']},'{$val['A']}','{$phone}',{$age},{$sex},'{$val['E']}','{$val['F']}',{$isMiHao},'{$val['H']}',{$rcId1},'{$rcName1}',{$rcId2},'{$rcName2}','{$session['path']}','{$qiWangDiZhi}'),";
        }
        $sql = $query.rtrim($queryInsert,',');
        //' ON DUPLICATE KEY UPDATE `phone` = VALUES(`phone`)';
        return $db->createCommand($sql)->execute();

    }

}