<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/16
 * Time: 10:39
 */

namespace backend\controllers;

use Yii;
use common\models\Department;
use backend\models\DepartmentLogic;

class DepartmentController extends BaseController
{
    /**
     * 部门列表
     */
    public function actionIndex()
    {
        $data['info'] = DepartmentLogic::getDeparmentInfo();
        $moduleId = Yii::$app->request->get('moduleId',0);

        //获取权限按钮信息
        $data['aclList'] = $this->getButAcl($moduleId);
        return $this->renderPartial('index',$data);
    }

    /**
     * 新增
     */
    public function actionAdd()
    {
        if (Yii::$app->request->post()) {
            $info = Yii::$app->request->post();
            $count = DepartmentLogic::checkDEparmentName($info['departmentName']);
            if ($count > 0) {
                returnJsonInfo('部门已存在！',300);
            }
            $role = new Department();
            $role->departmentName = $info['departmentName'];
            if ($role->save()) {
                returnJsonInfo('录入成功！');
            } else {
                returnJsonInfo('录入失败！',300);
            }
        }
        return $this->renderPartial('add');
    }

    /**
     * 编辑
     */
    public function actionEdit()
    {
        $departmentId = Yii::$app->request->get('id',Yii::$app->request->post('id'));
        $deparment = Department::find()->where(['id' => $departmentId])->one();
        if (Yii::$app->request->post()) {
            $info = Yii::$app->request->post();
            $deparment->departmentName = $info['departmentName'];
            if ($deparment->save()) {
                returnJsonInfo('编辑成功！');
            }else {
                returnJsonInfo('编辑失败！',300);
            }
        }
        $data['info'] = $deparment;
        return $this->renderPartial('edit',$data);
    }

    /**
     * 删除
     */
    public function actionDelete()
    {
        $departmentId = Yii::$app->request->get('id',0);
        if(Department::findOne($departmentId)->delete()) {
            returnJsonInfo('删除成功！');
        }
        returnJsonInfo('删除失败！',300);
    }
}