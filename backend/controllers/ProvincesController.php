<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/24
 * Time: 18:00
 */

namespace backend\controllers;



use backend\models\ProvincesLogic;

class ProvincesController extends BaseController
{

    public function actionAjaxCiti()
    {
        $id = \Yii::$app->request->post('id',0);
        $info = ProvincesLogic::getCites($id);
        return json_encode($info);
    }


}