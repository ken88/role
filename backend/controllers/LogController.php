<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/14
 * Time: 15:34
 */

namespace backend\controllers;

use common\models\Log;
use yii\data\Pagination;

class LogController extends BaseController
{
    public function actionIndex()
    {
        $query = Log::find();
        // 总数
        $count = $query->count();

        // 使用总数来创建一个分页对象
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 20]);

        $info = $query->offset($pagination->offset)
            ->limit($pagination->limit)->orderBy('id desc')->asArray()->all();
        $data = [
            'info' => $info,
            'pages' => $pagination,
        ];
        return $this->renderPartial('index',$data);
    }
}