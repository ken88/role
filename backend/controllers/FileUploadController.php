<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/22
 * Time: 13:46
 */

namespace backend\controllers;


class FileUploadController extends  BaseController
{
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }

    public function actionAdd()
    {

    }

}