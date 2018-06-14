<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/6
 * Time: 17:37
 */

namespace frontend\controllers;

use yii\rest\Controller;
use Yii;
use frontend\models\ResumeLogic;
use common\models\Resume;

class ResumeController extends Controller
{
    //加密规则  token + 'renlian' + 数组0数据 base64加密
    private $token;
    public function actionAdd()
    {
        $api = new ApiConntroller();
        $this->token = $api->getToken();
        if (Yii::$app->request->post()) {
            $info = Yii::$app->request->post();
            if ($info['token'] != $this->token) { //1.token验证
                returnJsonInfo('无效token!',300);
            }else if (empty($info['data'])) { //2.数据验证
                returnJsonInfo('没有可录入的数据!',300);
            }
            $data = json_decode($info['data'],true);
            //3签名验证
            if ($this->signCheck($data[0],$info['sign'])) {
                $itemArr = [];
                foreach ($data as $k => $v) {
                    //姓名或者手机号 为空不录入
                    if (empty($v['userName']) || empty($v['phone'])) {
                        continue;
                    }
                    //重复的手机号 保存最后一个信息
                    $itemArr[trim($v['phone'])] = $v;
                }
                // 没有数据
                if (empty($itemArr)) {
                    returnJsonInfo('录入成功！');
                }
                //查找数据库中是否存在手机号
                $phones = array_keys($itemArr);
                $resume = Resume::find()->select('phone')->where(['in','phone',$phones])->asArray()->all();
                //返回有数据清除重复的手机号
                if (!empty($resume)) {
                    foreach ($resume as $v) {
                        unset($itemArr[$v['phone']]);
                    }
                }
                // 没有数据
                if (empty($itemArr)) {
                    returnJsonInfo('录入成功！');
                }
                if (ResumeLogic::addResume($itemArr)) {
                    returnJsonInfo('录入成功!');
                }else {
                    returnJsonInfo('录入失败!',300);
                }
            } else {
                returnJsonInfo('签名验证失败!',300);
            }
        }
    }

    /**
     * 签名验证
     * @param $data 数据
     * @param $sign 签名
     */
    public function signCheck($data,$sign)
    {
        //获取本地签名
        $signLocal = $this->sign($data);
        return $signLocal == $sign ? true : false;
    }

    /**
     * 生成签名
     * @param $data 数据
     * @return string 签名
     */
    public function sign($data)
    {
        unset($data['gongZuoJingLi']);
        foreach ($data as $key => $value){
            $arr[$key] = $key;
        }
        sort($arr);
        $str = "";

        foreach ($arr as $k => $v) {
            $str .= $v.$data[$v];
        }

        return base64_encode($this->token.'renlian'.$str);
    }
}