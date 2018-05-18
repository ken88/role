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
        $moduleId = Yii::$app->request->get('moduleId',0);
        //获取权限按钮信息
        $data['aclList'] = $this->getButAcl($moduleId);
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
                //获取菜单信息
                $redis = Yii::$app->redis;
                $module =  ModuleLogic::getModuleInfo();
                $redis->set('moduleList',json_encode($module,true));
                returnJsonInfo('录入成功！');
            } else {
//                dump($module->getFirstErrors());
                returnJsonInfo('录入失败！',300);
            }
        }
    }

    /**
     * 菜单编辑
     */
    public function actionEdit()
    {
        $moduleId = Yii::$app->request->get('id',Yii::$app->request->post('id'));
        $module = Module::find()->where(['id' => $moduleId])->one();
        if (Yii::$app->request->post()) {
            $info = Yii::$app->request->post();
            $module->moduleName = $info['moduleName'];
            $module->url = $info['url'];
            $module->isBut = $info['isBut'];

            $tr  = Yii::$app->db->beginTransaction();
            try {
                if ($module->save()) {
                    //获取菜单信息
                    $redis = Yii::$app->redis;
                    $module = ModuleLogic::getModuleInfo();
                    if ($redis->set('moduleList', json_encode($module, true))) {
                        $tr->commit();
                        returnJsonInfo('编辑成功！');
                    } else {
                        returnJsonInfo('内存编辑失败！', 300);
                    }
                } else {
                    returnJsonInfo('编辑失败！', 300);
                }
            }catch (\Exception $e) {
                returnJsonInfo('编辑失败！', 300);
                $tr->rollBack();
            }
        }
        $data['module'] = $module;
        return $this->renderPartial('edit',$data);
    }

    /**
     * 删除
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get('id',0);
        if (Module::findOne($id)->delete()) {
            returnJsonInfo('删除成功！');
        }else {
            returnJsonInfo('删除失败！', 300);
        }
    }
}