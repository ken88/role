<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/19
 * Time: 15:50
 */

namespace backend\controllers;

use backend\models\EnterAndpersonLogic;
use backend\models\EnterpriseLogic;
use common\models\Enterprise;
use Yii;
use backend\models\ProvincesLogic;
use common\models\User;
use common\models\Enterandperson;

class EnterpriseController extends BaseController
{
    /**
     * 项目列表
     */
    public function actionIndex()
    {
        $name = Yii::$app->request->get('name','');//企业名称
        $legalEntity = Yii::$app->request->get('legalEntity','');//法务实体
        $projectStatus = Yii::$app->request->get('projectStatus',0);//项目状态
        $projectGrade = Yii::$app->request->get('projectGrade','');//项目等级
        $userName = Yii::$app->request->get('userName','');//创建人名字
        $personNames = Yii::$app->request->get('personNames','');//负责人名字
        $signCity = Yii::$app->request->get('signCity','');//签约市
        $signProvince = Yii::$app->request->get('signProvince','');//签约省
        $createTime = Yii::$app->request->get('createTime','');
        $createTime1 = Yii::$app->request->get('createTime1','');
        $keyWord = '';

        if (!empty($name)) {
            $keyWord .= " and name like '$name%'";
        }
        if (!empty($legalEntity)) {
            $keyWord .= " and legalEntity = '{$legalEntity}'";
        }
        if (!empty($projectStatus)) {
            $keyWord .= " and projectStatus = $projectStatus";
        }
        if (!empty($userName)) {
            $keyWord .= " and userName = '{$userName}'";
        }
        if (!empty($projectGrade)) {
            $keyWord .= " and projectGrade = '{$projectGrade}'";
        }
        if (!empty($personNames)) {
            $keyWord .= " and personNames like '%{$personNames}%'";
        }
        if ($signProvince != '') {
            $keyWord .= " and signProvince = '{$signProvince}'";
            if ($signCity != '') {
                $keyWord .= " and signCity = '{$signCity}'";
            }
        }
        if (!empty($createTime)) {
            $startTime = $createTime.' 00:00:00';
            $keyWord .= " and createTime > '{$startTime }'";
            if (!empty($createTime1)) {
                $endTime = $createTime1." 23:59:59";
                $keyWord .= " and createTime < '{$endTime}' ";
            }
        }

        $data = EnterpriseLogic::getInfo($keyWord);
        $moduleId = Yii::$app->request->get('moduleId',0);
        //获取权限按钮信息
        $aclList = $this->getButAcl($moduleId);
        //获取省
        $prov = ProvincesLogic::getProvinces();
        $data['prov'] = $prov;
        $data['aclList'] = $aclList;
        $data['userInfo'] = [
            'moduleId' => $moduleId,
            'name' => $name,
            'projectGrade' => $projectGrade,
            'signProvince' => $signProvince,
            'legalEntity' => $legalEntity,
            'projectStatus' => $projectStatus,
            'userName' => $userName,
            'personNames' => $personNames,
            'signCity' => $signCity,
            'createTime' => $createTime,
            'createTime1' => $createTime1,
        ];
        return $this->renderPartial('index',$data);
    }

    /**
     * 新增
     */
    public function actionAdd()
    {
        $session = $this->getSession();
        if (Yii::$app->request->post()) {

            $info = Yii::$app->request->post();
            if (empty($info['personNames'])) {
                returnJsonInfo('请选择项目负责人！',300);
            }else if (count($info['personNames']) > 5) {
                returnJsonInfo('项目负责人最多只能有5个！',300);
            }
            $personNames = '';
            $persionIds = [];
            foreach ($info['personNames'] as $v) {
                $psers = explode(',',$v);
                $personNames .= $psers[1].',';
                array_push($persionIds,$psers[0]);
            }
            $enter = new Enterprise();
            $enter->setAttributes($info);
            $enter->createTime = date('Y-m-d H:i:s');
            $enter->personNames = $personNames;
            $enter->userid = $session['id'];
            $enter->userName = $session['realName'];
            $enter->path = $session['path'];
            $tr = Yii::$app->db->beginTransaction();
            try {
                if ($enter->save()) {
                    $enterId = $enter->id;
                    $flag = EnterAndpersonLogic::adds($persionIds,$session['id'],$enterId);
                    if ($flag) {
                        $tr->commit();
                        returnJsonInfo('录入成功！');
                    } else {
                        $tr->rollBack();
                        returnJsonInfo('录入失败！',300);
                    }

                }else {
                    $tr->rollBack();
                    returnJsonInfo('录入失败！',300);
                }
            } catch (\Exception $e) {
                $tr->rollBack();
                returnJsonInfo('录入失败！',300);
            }

        }

        //部门人员
        $user = User::find()->select('id,username,realName')->where(['departmentId' => $session['departmentId']])->asArray()->all();
        //获取省
        $prov = ProvincesLogic::getProvinces();
        $data = [
            'user' => $user,
            'prov' => $prov
        ];
        return $this->renderPartial('add',$data);
    }

    /**
     * 编辑
     */
    public function actionEdit()
    {
        $id= Yii::$app->request->get('id',Yii::$app->request->post('id'));
        if (Yii::$app->request->post()) {
            $enter = Enterprise::find($id)->where(['id' => $id])->one();

            $info = Yii::$app->request->post();
            if (empty($info['personNames'])) {
                returnJsonInfo('请选择项目负责人！',300);
            }else if (count($info['personNames']) > 5) {
                returnJsonInfo('项目负责人最多只能有5个！',300);
            }
            $personNames = '';
            $persionIds = [];
            foreach ($info['personNames'] as $v) {
                $psers = explode(',',$v);
                $personNames .= $psers[1].',';
                array_push($persionIds,$psers[0]);
            }
            $enter->setAttributes($info);
            $enter->personNames = $personNames;
            $session = $this->getSession();
            $tr = Yii::$app->db->beginTransaction();
            try {
                if ($enter->save()) {
                    $enterId = $enter->id;
                    $flag = EnterAndpersonLogic::adds($persionIds,$session['id'],$enterId);
                    if ($flag) {
                        $tr->commit();
                        returnJsonInfo('操作成功！');
                    } else {
                        $tr->rollBack();
                        returnJsonInfo('操作失败！',300);
                    }

                }else {
                    $tr->rollBack();
                    returnJsonInfo('操作失败！',300);
                }
            } catch (\Exception $e) {
                $tr->rollBack();
                returnJsonInfo('操作失败！',300);
            }
        }
        $session = $this->getSession();
        $enter = Enterprise::find()->where(['id'=>$id])->asArray()->one();
        //部门人员
        $user = User::find()->select('id,username,realName')->where(['departmentId' => $session['departmentId']])->asArray()->all();
        //获取省
        $prov = ProvincesLogic::getProvinces();
        $data = [
            'user' => $user,
            'prov' => $prov,
            'info' => $enter,
        ];

        return $this->renderPartial('edit',$data);
    }

    /**
     *删除
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get('id',0);
        if(Enterprise::findOne($id)->delete()) {
            Enterandperson::deleteAll();
            returnJsonInfo('删除成功！');
        }
        returnJsonInfo('删除失败！',300);
    }
}