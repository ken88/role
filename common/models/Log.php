<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%log}}".
 *
 * @property int $id
 * @property string $messages 操作说明
 * @property string $createtime 操作时间
 * @property string $username 操作人
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%log}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['messages', 'createtime', 'username'], 'required'],
            [['createtime'], 'safe'],
            [['messages'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'messages' => 'Messages',
            'createtime' => 'Createtime',
            'username' => 'Username',
        ];
    }
}
