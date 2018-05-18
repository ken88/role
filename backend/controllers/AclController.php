<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17
 * Time: 10:51
 */

namespace backend\controllers;


use backend\models\ModuleLogic;
use common\models\Role;
use Yii;

class AclController extends BaseController
{
    /**
     * 角色授权列表
     */
    public function actionIndex()
    {
        $roleId = Yii::$app->request->get('roleId');
        $info = ModuleLogic::getModuleInfo();

        $redis = Yii::$app->redis;
        $acl = $redis->get('roleid'.$roleId);

        //验证内存中是否存在角色权限
        if ($acl == '') {
            $role = Role::find()->select('acl')->where(['id'=>$roleId])->asArray()->one();
            $acl = $role['acl'];
            $redis->set('roleid'.$roleId,$acl);
        }

        $data = [
            'info' => $info,
            'roleId' => $roleId,
            'acl' => $acl,
        ];
        return $this->renderPartial('index',$data);
    }

    /**
     * 角色授权
     */
    public function actionAuthorization()
    {
        $info = Yii::$app->request->post();
        if (empty($info['che'])) {
            returnJsonInfo('请选择授权菜单！',300);
        }
        $role = Role::find()->where(['id' => $info['roleId']])->one();
        $acl = implode(',',$info['che']);
        $role->acl = $acl;
        if ($role->save()) {
            $redis = Yii::$app->redis;
            $redis->set('roleid'.$info['roleId'],$acl);
            returnJsonInfo('授权成功！');
        }else {
            dd($role->getFirstErrors());
            returnJsonInfo('授权失败！',300);
        }
    }
}