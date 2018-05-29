<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 15:16
 */

namespace backend\controllers;

use backend\models\ResumeLogic;

use common\models\Resume;
use common\models\User;
use Yii;
use common\models\Departmentnumber;
use backend\models\ResumeCategoryLogic;

class GongHaiController extends BaseController
{
    /**
     * 公海首页
     */
    public function actionIndex()
    {
        $userName = Yii::$app->request->get('userName','');
        $age = (int)Yii::$app->request->get('age','');
        $phone = (int)Yii::$app->request->get('phone','');
        $xueLi = Yii::$app->request->get('xueLi','');
        $sex = (int)Yii::$app->request->get('sex','');
        $qiWangXinZi = Yii::$app->request->get('qiWangXinZi','');
        $isMiHao = Yii::$app->request->get('isMiHao','');
        $rcId1 = Yii::$app->request->get('rcId1','');
        $rcId2 = Yii::$app->request->get('rcId2','');
        $keyWord = '1=1';
        if (!empty($userName)) {
            $keyWord .= " and userName like '$userName%'";
        }
        if (!empty($age)) {
            $keyWord .= " and age = $age";
        }
        if (!empty($phone)) {
            $keyWord .= " and phone like '$phone%'";
        }
        if (!empty($xueLi)) {
            $keyWord .= " and xueLi = '{$xueLi}'";
        }
        if (!empty($sex)) {
            $keyWord .= " and sex = $sex";
        }
        if (!empty($qiWangXinZi)) {
            $keyWord .= " and qiWangXinZi = '{$qiWangXinZi}'";
        }
        if ($isMiHao != '') {
            $keyWord .= " and isMiHao = $isMiHao";
        }
        if (!empty($rcId1)) {
            $keyWord .= " and rcId1 = $rcId1";
        }
        if (!empty($rcId2)) {
            $keyWord .= " and rcId2 = $rcId2";
        }
        $session = $this->getSession();
        $data = ResumeLogic::getInfo(1,$keyWord);
        $moduleId = Yii::$app->request->get('moduleId',0);

        //获取权限按钮信息
        $aclList = $this->getButAcl($moduleId);
        $data['aclList'] = $aclList;

        //贡献值
        $num = Departmentnumber::find()->select('number')->where(['departmentId' => $session['departmentId']])->asArray()->one();
        $data['num'] = !empty($num) ? $num['number'] : 0;

        //部门人员
       $data['user'] = User::find()->select('id,username,realName')->where(['departmentId'=>$session['departmentId']])->asArray()->all();

        //获取岗位分类
        $data['gangwei'] = ResumeCategoryLogic::getAll(0);

        $data['userInfo'] = [
            'moduleId' => $moduleId,
            'userName' => $userName,
            'age' => $age,
            'phone' => $phone,
            'xueLi' => $xueLi,
            'sex' => $sex,
            'qiWangXinZi' => $qiWangXinZi,
            'isMiHao' => $isMiHao,
            'rcId1' => $rcId1,
            'rcId2' => $rcId2,
        ];
        return $this->renderPartial('index',$data);
    }

    /**
     * 分配
     */
    public function actionFenPei()
    {
        $session = $this->getSession();
        $info = Yii::$app->request->post();

        //贡献值
        $num = Departmentnumber::find()->where(['departmentId' => $session['departmentId']])->one();
        $count = count($info['ids']);

        //查找分配人级别
        $user = User::find()->select('level')->where(['id'=>$info['radios']])->asArray()->one();

        //贡献值大于分配值
        if ($num->number < $count) {
            returnJsonInfo('贡献值大于分配数！',300);
        }
        $tr = Yii::$app->db->beginTransaction();
        try {
            //更改分配信息
            if (Resume::updateAll(['isGongHai' => 0,'uid'=>$info['radios'],'level'=>$user['level']],['in','id',$info['ids']])) {
                $num->number -=  $count;
                if ($num->save()) {
                    $tr->commit();
                    returnJsonInfo('分配成功！');
                }else {
                    $tr->rollBack();
                    returnJsonInfo('分配失败！',300);
                }
            }else {
                $tr->rollBack();
                returnJsonInfo('分配失败！',300);
            }
        }catch (\Exception $e) {
            $tr->rollBack();
            returnJsonInfo('分配失败！',300);
        }
    }
}