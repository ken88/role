<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%enterandperson}}".
 *
 * @property int $enterpriseId 企业id
 * @property int $userId 创建人id
 * @property int $personId 负责人id
 */
class Enterandperson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%enterandperson}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enterpriseId', 'userId', 'personId'], 'required'],
            [['enterpriseId', 'userId', 'personId'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'enterpriseId' => 'Enterprise ID',
            'userId' => 'User ID',
            'personId' => 'Person ID',
        ];
    }
}
