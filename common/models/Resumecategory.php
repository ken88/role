<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%resumecategory}}".
 *
 * @property int $id
 * @property string $cName 岗位名
 * @property int $pid 父级id
 */
class Resumecategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%resumecategory}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cName', 'pid'], 'required'],
            [['pid'], 'integer'],
            [['cName'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cName' => 'C Name',
            'pid' => 'Pid',
        ];
    }
}
