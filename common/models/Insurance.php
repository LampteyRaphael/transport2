<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "insurance".
 *
 * @property int $id
 * @property string $renewalDate
 * @property string $expiringDate
 * @property int $vehicle_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Vehicles $vehicle
 */
class Insurance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'insurance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['renewalDate', 'expiringDate','amount', 'vehicle_id'], 'required'],
            [['renewalDate', 'expiringDate', 'created_at', 'updated_at'], 'safe'],
            [['vehicle_id'], 'integer'],
            [['amount'], 'integer'],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicles::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'renewalDate' => 'Renewal Date',
            'expiringDate' => 'Expiring Date',
            'vehicle_id' => 'Vehicle',
            'created_at' => 'Created',
            'updated_at' => 'Updated',
            'amount'=>'Amount'
        ];
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
