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
 * @property int $level 当前账号级别 10超级管理员 9管理员 在网下按照部门级别划分
 * @property int $roleId 角色id
 * @property string $roleName 角色名
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
            [['username', 'password', 'departmentId', 'departmentName', 'createDate', 'level', 'roleId', 'roleName'], 'required'],
            [['departmentId', 'level', 'roleId'], 'integer'],
            [['createDate'], 'safe'],
            [['username', 'departmentName', 'realName'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 32],
            [['roleName'], 'string', 'max' => 30],
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
            'level' => 'Level',
            'roleId' => 'Role ID',
            'roleName' => 'Role Name',
        ];
    }
}
