<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "answer".
 *
 * @property int $Id
 * @property string $message
 * @property string $owner
 * @property int $IdTicket
 * @property string $created_at
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message', 'owner', 'IdTicket', 'created_at'], 'required'],
            [['IdTicket'], 'integer'],
            [['created_at'], 'safe'],
            [['message'], 'string', 'max' => 300],
            [['owner'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'message' => 'Message',
            'owner' => 'Owner',
            'IdTicket' => 'Id Ticket',
            'created_at' => 'Created At',
        ];
    }
}
