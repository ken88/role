<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%departmentnumber}}".
 *
 * @property int $departmentId 部门id
 * @property int $number 贡献值数量
 */
class Departmentnumber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%departmentnumber}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['departmentId'], 'required'],
            [['departmentId', 'number'], 'integer'],
            [['departmentId'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'departmentId' => 'Department ID',
            'number' => 'Number',
        ];
    }
}
