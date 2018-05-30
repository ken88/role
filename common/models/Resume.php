<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%resume}}".
 *
 * @property int $id
 * @property string $userName 姓名
 * @property int $sex 性别1男2女
 * @property string $phone 手机号
 * @property int $isMiHao 是否秘号 1是0不是
 * @property int $age 年龄
 * @property string $xueLi 最高学历
 * @property string $rcName1 岗位分类1
 * @property int $rcId1 岗位分类id1
 * @property string $rcName2 岗位分类2
 * @property int $rcId2 岗位分类id2
 * @property string $qiWangDiDian 期望地点
 * @property string $qiWangXinZi 期望薪资
 * @property string $juZhuDiZhi 居住地址
 * @property string $huJiDiZhi 户籍地址
 * @property string $mianMao 政治面貌
 * @property string $qq qq
 * @property string $weiXin
 * @property string $lianXiRen 紧急联系人
 * @property string $lianXiRenPhone 紧急联系人电话
 * @property int $hunYin 婚姻状况 0未婚1已婚2丧偶
 * @property string $minZu 民族
 * @property string $chuShengRiQi 出生日期
 * @property string $shenFenZheng 身份证
 * @property string $zhuanYe 专业
 * @property string $email 邮件
 * @property string $yinHang 银行
 * @property string $kaiHuWangDian 开户网点
 * @property string $yinHangNum 银行卡号
 * @property int $uid 操作人id
 * @property int $departmentId 部门id
 * @property string $gongZuoJingLi 工作经历
 * @property int $level 级别
 * @property string $createTime 创建时间
 * @property int $isGongHai 是否公海简历 1是0不是
 * @property string $beizhu 备注
 * @property string $path 层级
 */
class Resume extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%resume}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userName', 'uid', 'departmentId', 'level'], 'required'],
            [['sex', 'isMiHao', 'age', 'rcId1', 'rcId2', 'hunYin', 'uid', 'departmentId', 'level', 'isGongHai'], 'integer'],
            [['createTime'], 'safe'],
            [['userName', 'qiWangDiDian', 'weiXin', 'lianXiRen', 'yinHangNum'], 'string', 'max' => 30],
            [['phone', 'qq', 'lianXiRenPhone'], 'string', 'max' => 11],
            [['xueLi', 'rcName1', 'rcName2', 'qiWangXinZi', 'mianMao', 'chuShengRiQi', 'zhuanYe'], 'string', 'max' => 20],
            [['juZhuDiZhi', 'huJiDiZhi', 'path'], 'string', 'max' => 100],
            [['minZu'], 'string', 'max' => 10],
            [['shenFenZheng'], 'string', 'max' => 18],
            [['email', 'yinHang', 'kaiHuWangDian', 'beizhu'], 'string', 'max' => 50],
            [['gongZuoJingLi'], 'string', 'max' => 8000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userName' => 'User Name',
            'sex' => 'Sex',
            'phone' => 'Phone',
            'isMiHao' => 'Is Mi Hao',
            'age' => 'Age',
            'xueLi' => 'Xue Li',
            'rcName1' => 'Rc Name1',
            'rcId1' => 'Rc Id1',
            'rcName2' => 'Rc Name2',
            'rcId2' => 'Rc Id2',
            'qiWangDiDian' => 'Qi Wang Di Dian',
            'qiWangXinZi' => 'Qi Wang Xin Zi',
            'juZhuDiZhi' => 'Ju Zhu Di Zhi',
            'huJiDiZhi' => 'Hu Ji Di Zhi',
            'mianMao' => 'Mian Mao',
            'qq' => 'Qq',
            'weiXin' => 'Wei Xin',
            'lianXiRen' => 'Lian Xi Ren',
            'lianXiRenPhone' => '联系人电话',
            'hunYin' => 'Hun Yin',
            'minZu' => '民族',
            'chuShengRiQi' => 'Chu Sheng Ri Qi',
            'shenFenZheng' => 'Shen Fen Zheng',
            'zhuanYe' => 'Zhuan Ye',
            'email' => 'Email',
            'yinHang' => 'Yin Hang',
            'kaiHuWangDian' => 'Kai Hu Wang Dian',
            'yinHangNum' => 'Yin Hang Num',
            'uid' => 'Uid',
            'departmentId' => 'Department ID',
            'gongZuoJingLi' => 'Gong Zuo Jing Li',
            'level' => 'Level',
            'createTime' => 'Create Time',
            'isGongHai' => 'Is Gong Hai',
            'beizhu' => 'Beizhu',
            'path' => 'Path',
        ];
    }
}
