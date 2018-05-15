<?php
/**
 * Created by PhpStorm.
 * User: yukai
 * Date: 2018/3/26
 * Time: 14:54
 */

namespace backend\controllers;

use common\models\User;
use Yii;

class IndexController extends BaseController
{
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }
    public function actionIndexs()
    {
        return $this->renderPartial('indexs');
    }
    public function intInfo($a)
    {
        dd($a);
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