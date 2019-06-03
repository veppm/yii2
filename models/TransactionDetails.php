<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaction_details".
 *
 * @property int $id
 * @property int $contest_id
 * @property int $order_id
 * @property string $transaction_id
 * @property string $transaction_amount
 * @property string $payment_status
 * @property int $payment_date
 * @property string $paypal_records
 *
 * @property Contest $contest
 * @property Contest $order
 */
class TransactionDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contest_id', 'order_id', 'transaction_id', 'transaction_amount', 'payment_status', 'payment_date'], 'required'],
            [['contest_id', 'order_id', 'payment_date'], 'integer'],
            [['payment_status', 'paypal_records'], 'string'],
            [['transaction_id'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contest_id' => 'Contest ID',
            'order_id' => 'Order ID',
            'transaction_id' => 'Transanction ID',
            'transaction_amount' => 'Paid Amount',
            'payment_status' => 'Payment Status',
            'payment_date' => 'Payment Date',
            'paypal_records' => 'Paypal Records',
        ];
    }
}
