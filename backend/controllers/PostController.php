<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/21
 * Time: 15:48
 */

namespace backend\controllers;

use common\models\Post;
use common\models\Enterprise;
use common\models\Resumecategory;
class PostController extends BaseController
{
    public function actionIndex()
    {
        //1.
        $session = $this->getSession();
        //1.取出项目信息
        $enter = Enterprise::find()->select('name,projectGrade')
            ->where(['userid' => 106])
            ->andWhere(['id' => 15])
            ->asArray()->all();

        //2.去岗位
        //Resumecategory::find()->where([''])

        dd($enter);

    }
}