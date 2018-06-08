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

class ResumeController extends Controller
{
    //加密规则  token + 'renlian' + 数据 base64加密
    private $token = '81c54b436b67739aa0ebc82e31e54fb9';
    public function actionAdd()
    {
       $data = [
           0=>[
               'userName' => '张三',
               'sex' => '1',
               'phone' => '13055302031',
               'isMiHao' => '1',
               'age' => '12',
               'xueLi' => '大专',
               'rcName1' => '服务',
               'rcName2' => '服务员',
               'qiWangDiDian' => '',
               'qiWangXinZi' => '',
               'juZhuDiZhi' => '',
               'huJiDiZhi' => '',
               'mianMao' => '',
               'qq' => '',
               'weiXin' => '',
               'lianXiRen' => '',
               'lianXiRenPhone' => '',
               'hunYin' => '',
               'minZu' => '',
               'chuShengRiQi' => '',
               'shenFenZheng' => '',
               'zhuanYe' => '',
               'email' => '',
               'yinHang' => '',
               'kaiHuWangDian' => '',
               'yinHangNum' => '',
               'gongZuoJingLi' => '',
               'beizhu' => '',
           ],
       ];
    }
}