<?php
/**
 * Created by PhpStorm.
 * User: yukai
 * Date: 2018/3/26
 * Time: 14:54
 */

namespace backend\controllers;

use backend\models\ModuleLogic;
use common\models\Role;
use Yii;

class IndexController extends BaseController
{
    /**
     * 首页
     */
    public function actionIndex()
    {
        $session =  $this->getSession();
        $redis = Yii::$app->redis;

        //获取缓存是否存在角色授权的信息
        if (!$redis->get('roleid'.$session['roleId'])) {
            $role = Role::find()->where(['id' => $session['roleId']])->one();
            $acl = $role['acl'];
            $redis = Yii::$app->redis;
            $redis->set('roleid'.$session['roleId'],$acl);
        }else {
            //获取角色权限
            $acl = $redis->get('roleid'.$session['roleId']);
        }

        //获取缓存菜单是否存在
        if (!$redis->get('moduleList')) {
            $moduleList = ModuleLogic::getModuleInfo();
            $redis->set('moduleList', json_encode($moduleList, true));
        }else {
            //获取菜单
            $moduleList = json_decode($redis->get('moduleList'),true);
        }

        $acl = explode(',',$acl);
        $data = [
            'acl' => $acl,
            'module' => $moduleList,
        ];
        return $this->renderPartial('index',$data);
    }


    public function actionIndexs()
    {
        return $this->renderPartial('indexs');
    }
}