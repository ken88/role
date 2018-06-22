<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property int $id
 * @property int $rc1id
 * @property int $rc2id
 * @property string $createTime
 * @property string $updateTime
 * @property int $enperId
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rc1id', 'rc2id', 'enperId'], 'integer'],
            [['createTime', 'updateTime'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rc1id' => 'Rc1id',
            'rc2id' => 'Rc2id',
            'createTime' => 'Create Time',
            'updateTime' => 'Update Time',
            'enperId' => 'Enper ID',
        ];
    }
}
