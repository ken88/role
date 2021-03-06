<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%role}}".
 *
 * @property int $id
 * @property string $roleName
 * @property int $uid 用户id
 * @property int $departmentId 部门id
 * @property string $acl 角色权限
 * @property int $level 级别
 * @property string $path 层级
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%role}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['roleName', 'uid', 'departmentId', 'level'], 'required'],
            [['uid', 'departmentId', 'level'], 'integer'],
            [['acl'], 'string'],
            [['roleName'], 'string', 'max' => 50],
            [['path'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'roleName' => 'Role Name',
            'uid' => 'Uid',
            'departmentId' => 'Department ID',
            'acl' => 'Acl',
            'level' => 'Level',
            'path' => 'Path',
        ];
    }
}
