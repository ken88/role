<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/16
 * Time: 13:31
 */

namespace backend\controllers;

use common\models\Module;
use backend\models\ModuleLogic;
use Yii;

class ModuleController extends BaseController
{
    /**
     * 菜单列表
     */
    public function actionIndex()
    {
        $data['info'] =ModuleLogic::getModuleInfo();
        return $this->renderPartial('index',$data);
    }

    /**
     * 菜单新增入口
     */
    public function actionAdd()
    {
        $pid = Yii::$app->request->get('pid');
        return $this->renderPartial('add',['pid' => $pid]);
    }

    /**
     * 菜单新增提交
     */
    public function actionAddSave()
    {
        if (Yii::$app->request->post()) {
            $info = Yii::$app->request->post();
            $module = new Module();
            $module->moduleName = $info['moduleName'];
            $module->pid = $info['pid'];
            $module->url = $info['url'];
            $module->isBut = $info['isBut'];
            if ($info['pid'] == 0) {
                $bpath = '0';
            }else {
                $res = Module::find()->where(['id' => $info['pid']])->asArray()->one();
                if($res['pid'] != 0){
                    $bpath = $res['bpath']."-".$info['pid'];
                }else{
                    $bpath = "0-".$info['pid'];
                }
            }
            $module->bpath = $bpath;

            if ($module->save()) {
                returnJsonInfo('录入成功！');
            } else {
//                dump($module->getFirstErrors());
                returnJsonInfo('录入失败！',300);
            }
        }
    }
}