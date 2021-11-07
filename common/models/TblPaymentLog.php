<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_payment_log".
 *
 * @property int $id
 * @property int $payment_id
 * @property int $amount
 * @property string $reciept_no
 *
 * @property TblPayments $payment
 */
class TblPaymentLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_payment_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_id', 'amount', 'reciept_no'], 'required'],
            [['payment_id', 'amount'], 'integer'],
            [['reciept_no'], 'string', 'max' => 100],
            [['payment_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblPayments::className(), 'targetAttribute' => ['payment_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_id' => 'Payment ID',
            'amount' => 'Amount',
            'reciept_no' => 'Reciept No',
        ];
    }

    /**
     * Gets query for [[Payment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(TblPayments::className(), ['id' => 'payment_id']);
    }
}
