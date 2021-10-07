<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_payment".
 *
 * @property int $id
 * @property float $amount
 * @property string $receipt_no
 * @property float|null $balance
 * @property int $user_id
 * @property int $admission_id
 * @property int $program_id
 * @property string $date
 * @property int $status
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property TblAppAdmission $admission
 * @property TblProgram $program
 * @property TblPaymentStatus $status0
 * @property TblUser $user
 */
class TblPayment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'receipt_no', 'user_id', 'admission_id', 'program_id', 'date', 'status'], 'required'],
            [['amount', 'balance'], 'number'],
            [['user_id', 'admission_id', 'program_id', 'status'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['receipt_no'], 'string', 'max' => 40],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblProgram::className(), 'targetAttribute' => ['program_id' => 'id']],
            [['admission_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppAdmission::className(), 'targetAttribute' => ['admission_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => TblPaymentStatus::className(), 'targetAttribute' => ['status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'receipt_no' => 'Receipt No',
            'balance' => 'Balance',
            'user_id' => 'User Admin',
            'admission_id' => 'Admission Applicant',
            'program_id' => 'Program',
            'date' => 'Date',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Admission]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmission()
    {
        return $this->hasOne(TblAppAdmission::className(), ['id' => 'admission_id']);
    }

    /**
     * Gets query for [[Program]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(TblProgram::className(), ['id' => 'program_id']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(TblPaymentStatus::className(), ['id' => 'status']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }


  

}
