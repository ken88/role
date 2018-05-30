<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15
 * Time: 13:04
 */

namespace backend\controllers;

use common\models\Role;
use Yii;
use yii\data\Pagination;

class RoleController extends BaseController
{
    /**
     * 角色列表
     */
    public function actionIndex()
    {
        $session = $this->getSession();

        $roleSql = Role::find()->where("path like '{$session['rolePath']}%'");

        // 总数
        $count = $roleSql->count();

        // 使用总数来创建一个分页对象
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=> 20]);

        $moduleId = Yii::$app->request->get('moduleId',0);
        //获取权限按钮信息
        $aclList = $this->getButAcl($moduleId);

        $info = $roleSql->orderBy('id desc')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->asArray()
            ->all();

        $data = [
            'info' => $info,
            'aclList' => $aclList,
            'pages' => $pagination
        ];
        return $this->renderPartial('index',$data);
    }

    /**
     * 新增
     */
    public function actionAdd()
    {
        if (Yii::$app->request->post()) {
            $info = Yii::$app->request->post();
            $count = Role::find()->where(['roleName' => $info['roleName']])->count();
            if ($count > 0) {
                returnJsonInfo('角色已存在！',300);
            }
            $session = $this->getSession();
            $role = new Role();
            $role->uid = $session['id'];
            $role->departmentId = $session['departmentId'];
            $role->roleName = $info['roleName'];
            $role->level = $session['level'] - 1;
            $role->path = $session['rolePath'];
            if ($role->save()) {
                $id = $role->id;
                $role->path = $role->path.'-'.$id;
                $role->save();
                returnJsonInfo('录入成功！');
            } else {
                dd($role->getFirstErrors());
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
        $id= Yii::$app->request->get('id',Yii::$app->request->post('id'));
        $role = Role::find()->where(['id' => $id])->one();
        if (Yii::$app->request->post()) {
            $info = Yii::$app->request->post();
            $role->roleName = $info['roleName'];
            if ($role->save()) {
                returnJsonInfo('操作成功！');
            }else {
                returnJsonInfo('操作失败！',300);
            }
        }
        $data = [
            'info' => $role
        ];
        return $this->renderPartial('edit',$data);
    }

    /**
     * 删除
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get('id',0);
        if(Role::findOne($id)->delete()) {
            $redis = Yii::$app->redis;
            $redis->del('roleid'.$id);
            returnJsonInfo('删除成功！');
        }
        returnJsonInfo('删除失败！',300);
    }
}