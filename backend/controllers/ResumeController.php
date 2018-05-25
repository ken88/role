<?php
/**
 * 简历控制器
 * User: Administrator
 * Date: 2018/5/23
 * Time: 15:58
 */

namespace backend\controllers;

use backend\models\ProvincesLogic;
use backend\models\ResumeCategoryLogic;
use backend\models\ResumeLogic;
use common\models\Resume;
use Yii;
use yii\data\Pagination;

class ResumeController extends BaseController
{
    /**
     * 简历列表
     */
    public function actionIndex()
    {
        $data = ResumeLogic::getInfo();
        $moduleId = Yii::$app->request->get('moduleId',0);
        //获取权限按钮信息
        $aclList = $this->getButAcl($moduleId);
        $data['aclList'] = $aclList;
        return $this->renderPartial('index',$data);
    }

    /**
     * 新增
     */
    public function actionAdd()
    {
        if (Yii::$app->request->post()) {
            $info = Yii::$app->request->post();
            $count = Resume::find()->where(['phone' => $info['phone']])->count();
            if ($count > 0) {
                returnJsonInfo('此号码已存在系统中，不可重复录入！',300);
            }

            $session = $this->getSession();
            $gongZuoJingLi = [];
            for ($i = 1 ; $i <= 3 ; $i++) {
                $gongZuoJingLi[$i] = [
                    'shijian'.$i => $info['shijian'.$i],
                    'qiye'.$i => $info['qiye'.$i],
                    'gangwei'.$i => $info['gangwei'.$i],
                ];
            }
            if ($info['rcName1'] != 0) {
                $rc1 = explode(',',$info['rcName1']);
                $rc2 = explode(',',$info['rcName2']);
                $info['rcId1'] = $rc1[0];
                $info['rcName1'] = $rc1[1];
                $info['rcId2'] = $rc2[0];
                $info['rcName2'] = $rc2[1];
            }
            $resume = new Resume();
            $resume->setAttributes($info);
            $resume->uid = $session['id'];
            $resume->qiWangDiDian = $info['select1'].$info['select2'].$info['select3'];
            $resume->level = $session['level'];
            $resume->email = $info['emails'];
            $resume->departmentId = $session['departmentId'];
            $resume->gongZuoJingLi = json_encode($gongZuoJingLi,320);
            $resume->createTime = date('Y-m-d H:i:s');
            if ($resume->save()){
                returnJsonInfo('录入成功！');
            }
            dd($resume->getFirstErrors());
            returnJsonInfo('录入失败！',300);
        }
        //获取岗位分类
        $info = ResumeCategoryLogic::getAll(0);
        //获取省
        $prov = ProvincesLogic::getProvinces();
        $data = [
            'info' => $info,
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
        $resume = Resume::find()->where(['id' => $id])->one();
        if (Yii::$app->request->post()) {
            $info = Yii::$app->request->post();
            $resume->roleName = $info['roleName'];
            if ($resume->save()) {
                returnJsonInfo('操作成功！');
            }else {
                returnJsonInfo('操作失败！',300);
            }
        }
        //获取岗位分类
        $cate = ResumeCategoryLogic::getAll(0);
        //获取省
        $prov = ProvincesLogic::getProvinces();
        $data = [
            'info' => $resume,
            'prov' => $prov,
            'cate' => $cate
        ];

        return $this->renderPartial('edit',$data);
    }

    /**
     * 删除
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get('id',0);
        if (Resume::findOne($id)->delete()) {
            returnJsonInfo('删除成功！');
        }else {
            returnJsonInfo('删除失败！', 300);
        }
    }
}