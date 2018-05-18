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

        //获取角色权限
        $acl = $redis->get('roleid'.$session['roleId']);

        //获取菜单
        $moduleList = json_decode($redis->get('moduleList'),true);

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