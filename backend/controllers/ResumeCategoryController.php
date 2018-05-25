<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/24
 * Time: 9:48
 */

namespace backend\controllers;

use backend\models\ResumeCategoryLogic;
use Yii;
use yii\data\Pagination;
use common\models\Resumecategory;

class ResumeCategoryController extends BaseController
{
    /**
     *首页
     */
    public function actionIndex()
    {
        $pid = Yii::$app->request->get('pid',0);
        $query = Resumecategory::find()->where(['pid' => $pid]);
        // 总数
        $count = $query->count();

        // 使用总数来创建一个分页对象
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=> 20]);

        $moduleId = Yii::$app->request->get('moduleId',0);
        //获取权限按钮信息
        $aclList = $this->getButAcl($moduleId);

        $info = $query->orderBy('id desc')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->asArray()
            ->all();

        $data = [
            'info' => $info,
            'aclList' => $aclList,
            'moduleId' => $moduleId,
            'pages' => $pagination,
            'pid' => $pid
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
            $count = Resumecategory::find()->where(['cName' => $info['cName']])->count();
            if ($count > 0) {
                returnJsonInfo('分类已存在！',300);
            }

            $resumeC = new Resumecategory();
            $resumeC->cName = $info['cName'];
            $resumeC->pid = $info['pid'];
            if ($resumeC->save()) {
                returnJsonInfo('操作成功！');
            }
            returnJsonInfo('操作失败！',300);
        }
        $data['pid'] = Yii::$app->request->get('pid',0);
        return $this->renderPartial('add',$data);
    }

    /**
     * 编辑
     */
    public function actionEdit()
    {
        $id= Yii::$app->request->get('id',Yii::$app->request->post('id'));
        $resumeC = Resumecategory::find()->where(['id' => $id])->one();
        if (Yii::$app->request->post()) {
            $info = Yii::$app->request->post();
            $resumeC->cName = $info['cName'];
            if ($resumeC->save()) {
                returnJsonInfo('操作成功！');
            }else {
                returnJsonInfo('操作失败！',300);
            }
        }
        $data = [
            'info' => $resumeC
        ];
        return $this->renderPartial('edit',$data);
    }

    /**
     * 删除
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get('id',0);
        if(Resumecategory::findOne($id)->delete()) {
            returnJsonInfo('删除成功！');
        }
        returnJsonInfo('删除失败！',300);
    }

    public function actionAjaxCategory()
    {
        $id = Yii::$app->request->post('id',0);

        $info = ResumeCategoryLogic::getAll($id);
        echo  json_encode($info);
    }
}