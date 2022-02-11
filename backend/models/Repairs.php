<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "repairs".
 *
 * @property int $id
 * @property string $datePresented
 * @property int $vehicle_id
 * @property int $driver_id
 * @property string $garageName
 * @property string $description
 * @property float $amount
 * @property int|null $officerAssigned
 * @property string|null $dateReturned
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Vehicles $vehicle
 * @property User $officerAssigned0
 * @property Drivers $driver
 */
class Repairs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'repairs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['datePresented', 'vehicle_id', 'driver_id', 'garageName', 'description', 'amount'], 'required'],
            [['datePresented', 'dateReturned', 'created_at', 'updated_at'], 'safe'],
            [['vehicle_id', 'driver_id', 'officerAssigned'], 'integer'],
            [['amount'], 'number'],
            [['garageName', 'description'], 'string', 'max' => 255],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicles::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
            [['officerAssigned'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['officerAssigned' => 'id']],
            [['driver_id'], 'exist', 'skipOnError' => true, 'targetClass' => Drivers::className(), 'targetAttribute' => ['driver_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'datePresented' => 'Date Presented',
            'vehicle_id' => 'Vehicle',
            'driver_id' => 'Driver',
            'garageName' => 'Garage Name',
            'description' => 'Description',
            'amount' => 'Amount',
            'officerAssigned' => 'Officer Assigned',
            'dateReturned' => 'Date Returned',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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

    /**
     * Gets query for [[OfficerAssigned0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOfficerAssigned0()
    {
        return $this->hasOne(User::className(), ['id' => 'officerAssigned']);
    }

    /**
     * Gets query for [[Driver]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDriver()
    {
        return $this->hasOne(Drivers::className(), ['id' => 'driver_id']);
    }
}
