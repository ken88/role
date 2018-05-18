<?php
/**
 * Created by PhpStorm.
 * User: yukai
 * Date: 2018/4/9
 * Time: 14:19
 */

namespace backend\controllers;

use backend\models\ModuleLogic;
use common\models\Log;
use yii\web\Controller;
use Yii;

class BaseController extends Controller
{
    public $enableCsrfValidation = false;
    public function init()
    {
        parent::init();
        $session = \Yii::$app->session;
        $user = $session->get('userinfo');
        if (empty($user)) {
            $this->redirect('/site/login');
        }
    }

    /**
     * 菜单按钮权限验证
     * @param $moduleId integer 菜单id
     */
    public function getButAcl($moduleId)
    {
        $session = $this->getSession();
        $roleId = $session['roleId'];
        $redis = Yii::$app->redis;
        $acl = $redis->get('roleid'.$roleId);
        $moduleList = null;
        //验证redis 是否存放module菜单信息
        if (!$redis->exists('moduleList')) {
            //生成菜单缓存
            $moduleList = ModuleLogic::getModuleInfo();
            $redis->set('moduleList',json_encode($moduleList,true));
        }else {
            $moduleList = json_decode($redis->get('moduleList'),true);
        }
        $moduleBut = [];
        //查找当前菜单下面的按钮 生成数组
        foreach ($moduleList as $v) {
            if ($v['pid'] == $moduleId) {
                array_push($moduleBut,$v);
            }
        }
        $data = [
            'acl' => explode(',',$acl),
            'moduleBut' => $moduleBut
        ];
        return $data;
    }

    /**
     * 获取用户session信息
     */
    public function getSession()
    {
        $session = Yii::$app->session;
        return $session->get('userinfo');
    }

    /*
     * 操作日志记录
     */
    public function addLog($message)
    {
        $session = $this->getSession();
        $log = new Log();
        $log->messages = $message;
        $log->createtime = date('Y-m-d H:i:s');
        $log->username = $session['username'];
        $log->save();
    }

}