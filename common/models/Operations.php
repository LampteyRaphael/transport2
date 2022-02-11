<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "operations".
 *
 * @property int $id
 * @property int $vehicle_id
 * @property int $driver_id
 * @property int $trip_type
 * @property string $trip_start_location
 * @property string $trip_end_location
 * @property int $trip_id
 * @property string $start_date
 * @property string $end_date
 * @property string $departureMileage
 * @property float $amount
 * @property int $officerAssigned
 * @property string|null $assignmentCompletionTime
 * @property string|null $arrivalMileage
 * @property string|null $trip_cancelled
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Vehicles $vehicle
 * @property User $officerAssigned0
 * @property TripTypeStatus $tripType
 * @property TripStatus $trip
 * @property Drivers $driver
 */
class Operations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vehicle_id', 'driver_id', 'trip_type', 'trip_start_location', 'trip_end_location', 'trip_id', 'start_date', 'end_date', 'departureMileage', 'amount', 'officerAssigned'], 'required'],
            [['vehicle_id', 'driver_id', 'trip_type', 'trip_id', 'officerAssigned'], 'integer'],
            [['start_date', 'end_date', 'assignmentCompletionTime', 'created_at', 'updated_at'], 'safe'],
            [['amount'], 'number'],
            [['trip_cancelled'], 'string'],
            [['trip_start_location', 'trip_end_location', 'departureMileage', 'arrivalMileage'], 'string', 'max' => 255],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicles::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
            [['officerAssigned'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['officerAssigned' => 'id']],
            [['trip_type'], 'exist', 'skipOnError' => true, 'targetClass' => TripTypeStatus::className(), 'targetAttribute' => ['trip_type' => 'id']],
            [['trip_id'], 'exist', 'skipOnError' => true, 'targetClass' => TripStatus::className(), 'targetAttribute' => ['trip_id' => 'id']],
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
            'vehicle_id' => 'Vehicle',
            'driver_id' => 'Driver',
            'trip_type' => 'Trip Type',
            'trip_start_location' => 'Trip Start Location',
            'trip_end_location' => 'Trip End Location',
            'trip_id' => 'Trip',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'departureMileage' => 'Departure Mileage',
            'amount' => 'Amount',
            'officerAssigned' => 'Officer Assigned',
            'assignmentCompletionTime' => 'Assignment Completion Time',
            'arrivalMileage' => 'Arrival Mileage',
            'trip_cancelled' => 'Trip Cancelled',
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
     * Gets query for [[TripType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTripType()
    {
        return $this->hasOne(TripTypeStatus::className(), ['id' => 'trip_type']);
    }

    /**
     * Gets query for [[Trip]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrip()
    {
        return $this->hasOne(TripStatus::className(), ['id' => 'trip_id']);
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
