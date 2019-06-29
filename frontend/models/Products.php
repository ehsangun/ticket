<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $ID
 * @property string $Name
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'Name'], 'required'],
            [['ID'], 'integer'],
            [['Name'], 'string', 'max' => 100],
            [['ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Name' => 'Name',
        ];
    }
}
