<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/11
 * Time: 14:34
 */

namespace frontend\models;

use common\models\Resumecategory;
use backend\models\ProvincesLogic;
use Yii;

class ResumeLogic
{
    public static function addResume($res)
    {
        $db = Yii::$app->db;
        $query = 'INSERT INTO resume (userName,sex,phone,isMiHao,age,xueLi,rcName1,rcId1,rcName2,rcId2,qiWangDiDian,qiWangXinZi,juZhuDiZhi,huJiDiZhi,mianMao,qq,weiXin,lianXiRen,lianXiRenPhone,hunYin,minZu,chuShengRiQi,shenFenZheng,zhuanYe,email,yinHang,kaiHuWangDian,yinHangNum,uid,uName,departmentId,gongZuoJingLi,level,createTime,isGongHai,beizhu,path,createDate,status) VALUES ';
        $queryInsert = null;
        $category = Resumecategory::find()->asArray()->all();
        //地区省
        $sheng = ProvincesLogic::getProvinces();
        $createData = date('Y-m-d');

        foreach ($res as $val) {
            $rcId1 = 0;
            $rcName1 = '';
            $rcId2 = 0;
            $rcName2 = '';
            $qiWangDiZhi = '';
            //城市
            if (!empty($val['qiWangDiDian'])) {
                $city = explode('-',$val['qiWangDiDian']);
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

            $queryInsert .= "(),";
        }
        $sql = $query.rtrim($queryInsert,',');
        return $db->createCommand($sql)->execute();
    }
}