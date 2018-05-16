<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%module}}".
 *
 * @property int $id
 * @property string $moduleName 菜单名
 * @property int $pid 父级id
 * @property string $bpath 级别结构
 * @property string $url 菜单地址
 * @property int $isBut 是否是按钮 0不是 1是
 */
class Module extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%module}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['moduleName', 'pid', 'bpath', 'url'], 'required'],
            [['pid', 'isBut'], 'integer'],
            [['moduleName', 'bpath'], 'string', 'max' => 50],
            [['url'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'moduleName' => 'Module Name',
            'pid' => 'Pid',
            'bpath' => 'Bpath',
            'url' => 'Url',
            'isBut' => 'Is But',
        ];
    }
}
