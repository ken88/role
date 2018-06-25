<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%enterprise}}".
 *
 * @property int $id id
 * @property string $name 企业名称
 * @property string $legalEntity 法务实体
 * @property string $projectGrade 项目等级
 * @property int $projectStatus 项目状态 1已签约 2已解约
 * @property string $profitModel 利润模式
 * @property string $socialCycle 社保公积金结算周期
 * @property string $signCity 签约市
 * @property string $signProvince 签约省
 * @property string $startTime 合约起止时间
 * @property string $endTime
 * @property string $createTime 创建时间
 * @property string $img 公司照片
 * @property string $synopsis 公司简介
 * @property int $userid 创建人id
 * @property string $userName 创建人名字
 * @property string $personNames 项目负责人
 * @property string $path
 */
class Enterprise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%enterprise}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'legalEntity', 'projectGrade', 'profitModel', 'socialCycle', 'signCity', 'startTime', 'endTime', 'createTime', 'userid', 'userName', 'personNames', 'path'], 'required'],
            [['projectStatus', 'userid'], 'integer'],
            [['startTime', 'endTime', 'createTime'], 'safe'],
            [['name', 'personNames', 'path'], 'string', 'max' => 50],
            [['legalEntity', 'profitModel', 'socialCycle', 'signCity', 'signProvince', 'userName'], 'string', 'max' => 30],
            [['projectGrade'], 'string', 'max' => 20],
            [['img'], 'string', 'max' => 250],
            [['synopsis'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'legalEntity' => 'Legal Entity',
            'projectGrade' => 'Project Grade',
            'projectStatus' => 'Project Status',
            'profitModel' => 'Profit Model',
            'socialCycle' => 'Social Cycle',
            'signCity' => 'Sign City',
            'signProvince' => 'Sign Province',
            'startTime' => 'Start Time',
            'endTime' => 'End Time',
            'createTime' => 'Create Time',
            'img' => 'Img',
            'synopsis' => 'Synopsis',
            'userid' => 'Userid',
            'userName' => 'User Name',
            'personNames' => 'Person Names',
            'path' => 'Path',
        ];
    }
}
