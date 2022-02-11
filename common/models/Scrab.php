<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "scrab".
 *
 * @property int $id
 * @property int $vehicle_id
 * @property int $user_id
 * @property float $amount
 * @property float|null $balance
 * @property string $company
 *
 * @property User $user
 * @property Vehicles $vehicle
 */
class Scrab extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scrab';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vehicle_id', 'user_id', 'amount', 'company'], 'required'],
            [['vehicle_id', 'user_id'], 'integer'],
            [['amount', 'balance'], 'number'],
            [['company'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicles::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vehicle_id' => 'Vehicle',
            'user_id' => 'User',
            'amount' => 'Amount',
            'balance' => 'Balance',
            'company' => 'Company',
        ];
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

    /**
     * Gets query for [[Vehicle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(Vehicles::className(), ['id' => 'vehicle_id']);
    }
}
