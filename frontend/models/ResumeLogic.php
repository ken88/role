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
        $query = 'INSERT INTO resume (userName,sex,phone,isMiHao,age,xueLi,rcName1,rcId1,rcName2,rcId2,qiWangDiDian,qiWangXinZi,juZhuDiZhi,huJiDiZhi,mianMao,qq,weiXin,lianXiRen,lianXiRenPhone,hunYin,minZu,chuShengRiQi,shenFenZheng,zhuanYe,email,yinHang,kaiHuWangDian,yinHangNum,uid,uName,departmentId,gongZuoJingLi,level,isGongHai,beizhu,path,createDate,status) VALUES ';
        $queryInsert = null;
        $category = Resumecategory::find()->asArray()->all();
        //地区省
        $sheng = ProvincesLogic::getProvinces();

        $createData = date('Y-m-d');

        $redis = Yii::$app->redis;

        foreach ($res as $val) {
            $rcId1 = 0;//分类1id
            $rcName1 = '';//分类1名字
            $rcId2 = 0;//分类2id
            $rcName2 = '';//分类2名字
            $qiWangDiZhi = '';//期望地址
            $uid = 0;//所属人id
            $uName = '';//所属人名
            $departmentId = 0;//部门id
            $level = 7;//级别默认员工
            $path = '0';
            $isGongHai = 1;
            $gongZuoJingLi = !empty($val['gongZuoJingLi']) ? json_encode($val['gongZuoJingLi']) : '';

            //人员信息不存在 放入公海
            if ($redis->exists($val['uName'])) {
                $user = json_decode($redis->get($val['uName']),true);
                $uName = $user['realName'];
                $uid = $user['id'];
                $departmentId = $user['departmentId'];
                $level = $user['level'];
                $isGongHai = 0;
                $path = $user['path'];
            }
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
                if ($c['cName'] == $val['rcName1']) {
                    $rcId1 = $c['id'];
                    $rcName1 = $c['cName'];
                    break;
                }
            }
            //获取2级分类信息
            foreach ($category as $c) {
                if ($c['cName'] == $val['rcName2']) {
                    $rcId2 = $c['id'];
                    $rcName2 = $c['cName'];
                    break;
                }
            }

            $queryInsert .= "('{$val['userName']}',{$val['sex']},{$val['phone']},{$val['isMiHao']},{$val['age']},'{$val['xueLi']}','{$rcName1}',$rcId1,'{$rcName2}',$rcId2,'{$qiWangDiZhi}','{$val['qiWangXinZi']}','{$val['juZhuDiZhi']}','{$val['huJiDiZhi']}','{$val['mianMao']}',{$val['qq']},'{$val['weiXin']}','{$val['lianXiRen']}','{$val['lianXiRenPhone']}',{$val['hunYin']},'{$val['minZu']}','{$val['chuShengRiQi']}','{$val['shenFenZheng']}','{$val['zhuanYe']}','{$val['email']}','{$val['yinHang']}','{$val['kaiHuWangDian']}','{$val['yinHangNum']}',{$uid},'{$uName}',{$departmentId},'{$gongZuoJingLi}',{$level},{$isGongHai},'{$val['beizhu']}','{$path}','{$createData}',{$val['status']}),";

        }

        $sql = $query.rtrim($queryInsert,',');
        return $db->createCommand($sql)->execute();
    }
}