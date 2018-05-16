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

class DepartmentController extends BaseController
{
    /**
     * 部门列表
     */
    public function actionIndex()
    {
        $data['info'] = Department::find()->orderBy('id desc')->asArray()->all();
        return $this->renderPartial('index',$data);
    }

    /**
     * 新增
     */
    public function actionAdd()
    {
        if (Yii::$app->request->post()) {
            $info = Yii::$app->request->post();
            $count = Department::find()->where(['departmentName' => $info['departmentName']])->count();
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
}