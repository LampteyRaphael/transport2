<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operations".
 *
 * @property int $id
 * @property int $driver_id
 * @property string $departurePoint
 * @property string $departureMileage
 * @property string $destination
 * @property string $date
 * @property int $officerAssigned
 * @property string|null $assignmentCompletionTime
 * @property string|null $arrivalMileage
 * @property int $vehicle_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Vehicles $vehicle
 * @property User $officerAssigned0
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
            [['driver_id', 'departurePoint', 'departureMileage', 'destination', 'date', 'officerAssigned', 'vehicle_id'], 'required'],
            [['driver_id', 'officerAssigned', 'vehicle_id'], 'integer'],
            [['date', 'assignmentCompletionTime', 'created_at', 'updated_at'], 'safe'],
            [['departurePoint', 'departureMileage', 'destination', 'arrivalMileage'], 'string', 'max' => 255],
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
            'driver_id' => 'Driver',
            'departurePoint' => 'Departure Point',
            'departureMileage' => 'Departure Mileage',
            'destination' => 'Destination',
            'date' => 'Date',
            'officerAssigned' => 'Officer Assigned',
            'assignmentCompletionTime' => 'Assignment Completion Time',
            'arrivalMileage' => 'Arrival Mileage',
            'vehicle_id' => 'Vehicle',
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
