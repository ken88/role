<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/22
 * Time: 13:46
 */

namespace backend\controllers;
use Yii;
use backend\models\UploadForm;
use yii\web\UploadedFile;

class FileUploadController extends  BaseController
{
    //单文件上传
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }

    //多文件上传
    public function actionIndexs()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->uploads()) {
                returnJsonInfo('上传成功！');
            }else {
                returnJsonInfo($model->getFirstErrors()['imageFiles'],300);

            }
        }

        return $this->renderPartial('indexs', ['model' => $model]);
    }

    public function actionAdd()
    {
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                returnJsonInfo('上传成功！');
            }else {
                returnJsonInfo($model->getFirstErrors()['imageFiles'],300);

            }
        }
    }

    public function actionAdds()
    {
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->uploads()) {
                returnJsonInfo('上传成功！');
            }else {
                returnJsonInfo($model->getFirstErrors()['imageFiles'],300);

            }
        }
    }

}