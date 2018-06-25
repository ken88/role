<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/22
 * Time: 18:09
 */

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm  extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $imageFiles;

    public function rules()
    {
        //单个文件上传
//        return [
//            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
//        ];
        //多个文件上传
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg,jpeg', 'maxFiles' => 4],
        ];
    }

    public function upload()
    {
        $file_name = md5(time());
        $path = 'uploads/'.date("Y").'/'.date("m").'/'.date('d').'/';
        if (!file_exists($path)) {
            createDir($path);
        }
        //单个文件上传
        if ($this->validate()) {
            $this->imageFile->saveAs($path.$file_name . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }

    }

    //多个文件上传
    public function uploads()
    {
        $path = 'uploads/'.date("Y").'/'.date("m").'/'.date('d').'/';
        $img = [];
        if (!file_exists($path)) {
            createDir($path);
        }
        //多个文件上传
        if ($this->validate()) {
            foreach ($this->imageFiles as $k => $file) {
                $file_name = md5(time().$k);
                $file->saveAs($path.$file_name . '.' . $file->extension);
                array_push($img,$path.$file_name . '.' . $file->extension);
            }
        }
        return $img;
    }
}