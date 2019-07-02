<?php

namespace common\models;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "ticket".
 *
 * @property int $ID
 * @property string $subject
 * @property string $products
 * @property string $description
 * @property int $IdCustomer
 * @property int $IdAdmin
 * @property string $created_at
 * @property string isAnswered
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject', 'products', 'description'], 'required'],
            [['IdCustomer', 'IdAdmin'], 'integer'],
            [['isAnswered'], 'boolean'],
            [['created_at'], 'safe'],
            [['subject', 'products'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'subject' => 'Subject',
            'products' => 'Products',
            'description' => 'Description',
            'IdCustomer' => 'Id Customer',
            'IdAdmin' => 'Id Admin',
            'created_at' => 'Created At',
            'isAnswered' => 'IsAnswered',
        ];
    }
    public function getModel($id){
        if (($model = Ticket::findOne($id)) !== null) {
            return $model;
        }

//        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
