<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username 用户名
 * @property string $password 密码
 * @property int $departmentId 部门id
 * @property string $departmentName 部门名
 * @property string $realName 员工姓名
 * @property string $createDate 录入时间
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'departmentId', 'departmentName', 'createDate'], 'required'],
            [['departmentId'], 'integer'],
            [['createDate'], 'safe'],
            [['username', 'departmentName', 'realName'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'departmentId' => 'Department ID',
            'departmentName' => 'Department Name',
            'realName' => 'Real Name',
            'createDate' => 'Create Date',
        ];
    }
}
