<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17
 * Time: 10:51
 */

namespace backend\controllers;


use backend\models\ModuleLogic;
use common\models\Module;
use common\models\Role;
use Yii;

class AclController extends BaseController
{
    /**
     * 角色授权列表
     */
    public function actionIndex()
    {
        /**
         * 角色授权说明
         * 1.如果是技术部管理员  获取所有菜单
         * 2.其他获取本身菜单
         */
        $session = $this->getSession();
        $roleId = Yii::$app->request->get('roleId');
        $redis = Yii::$app->redis;

        $acl = $redis->get('roleid'.$roleId);
        //验证内存中是否存在当前被授权的角色权限
        if ($acl == '') {
            $role = Role::find()->select('acl')->where(['id'=>$roleId])->asArray()->one();
            $acl = $role['acl'];
        }

        if ($session['level'] == 10) { //技术管理员
            //如果是超级管理员获取所有菜单
            $info = json_decode($redis->get('moduleList'),true);
        }else {
            ////获取本身的角色权限
            $thisAcl = $redis->get('roleid'.$session['roleId']);
            $sql = "SELECT *,concat( bpath,'-',id ) as bpaths FROM module where id in($thisAcl) ORDER BY bpaths";
            $info = Module::findBySql($sql)->asArray()->all();
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
        $tr  = Yii::$app->db->beginTransaction();
        try {
            if ($role->save()) {
                $redis = Yii::$app->redis;
                if ($redis->set('roleid'.$info['roleId'],$acl)) {
                    $tr->commit();
                    returnJsonInfo('授权成功！');
                }else {
                    $tr->rollBack();
                    returnJsonInfo('授权失败！',300);
                }
            }else {
                $tr->rollBack();
                returnJsonInfo('授权失败！',300);
            }
        }catch (\Exception $e) {
            $tr->rollBack();
            returnJsonInfo('授权失败！', 300);
        }
    }

}