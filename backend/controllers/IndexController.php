<?php
/**
 * Created by PhpStorm.
 * User: yukai
 * Date: 2018/3/26
 * Time: 14:54
 */

namespace backend\controllers;

use common\models\Module;
use common\models\Role;
use common\models\User;
use Yii;

class IndexController extends BaseController
{
    public function actionIndex()
    {
        $session =  $this->getSession();
        $redis = Yii::$app->redis;
        //获取角色权限
        $acl = Role::find()->select('acl')->where(['id'=>$session['roleId']])->asArray()->one();

        //获取菜单信息
        $sql = "SELECT *,concat( bpath,'-',id ) as bpaths FROM module where isBut = 1 ORDER BY bpaths";
        $module =  Module::findBySql($sql)->asArray()->all();
        $redis->set('roleid'.$session['roleId'],$acl['acl']);
        $acl = explode(',',$acl['acl']);

        $data = [
            'acl' => $acl,
            'module' => $module
        ];
        return $this->renderPartial('index',$data);
    }


    public function actionIndexs()
    {
        return $this->renderPartial('indexs');
    }


    public function actionJson()
    {
//        $data['data'] = User::find()->where(['id'=>100])->asArray()->one();
        $res = User::find()->asArray()->all();

        $data = [
            'data' => $this->checkRes($res),
        ];
        $this->returnJson($data);

//        $redis = Yii::$app->redis;
//        $redis->set('abc','bbb');

//        \Yii::$app->cache->set('v1',11111);
//        echo \Yii::$app->cache->get('a');
    }

    public function returnJson($data)
    {

        echo  json_encode($data,JSON_FORCE_OBJECT);
        die();
    }

    public function checkRes($res)
    {
        return empty($res) ? "{}" : $res;
    }
}