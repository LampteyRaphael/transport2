<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vehicles".
 *
 * @property int $id
 * @property string $make
 * @property string $regNo
 * @property string $chasisNo
 * @property string|null $yearMade
 * @property string|null $purchaseDate
 * @property string|null $colour
 * @property string|null $countryOfOrigin
 * @property int $no_passengers
 * @property string|null $cubicCentimeter
 * @property string|null $fuel
 * @property string $engine_no
 * @property int $vehicle_id
 * @property string|null $file
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property AccidentRecords[] $accidentRecords
 * @property Drivers[] $drivers
 * @property Insurance[] $insurances
 * @property Operations[] $operations
 * @property Reminder[] $reminders
 * @property Repairs[] $repairs
 * @property RoadWorthy[] $roadWorthies
 * @property Scrab[] $scrabs
 * @property Servicings[] $servicings
 * @property VehicleGroup $vehicle
 * @property VehicleStatus $status0
 */
class Vehicles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['make', 'regNo', 'chasisNo', 'no_passengers', 'engine_no', 'vehicle_id', 'status'], 'required'],
            [['yearMade', 'purchaseDate', 'created_at', 'updated_at'], 'safe'],
            [['no_passengers', 'vehicle_id', 'status'], 'integer'],
            [['make', 'regNo', 'chasisNo', 'colour', 'countryOfOrigin', 'cubicCentimeter', 'fuel', 'file'], 'string', 'max' => 255],
            [['engine_no'], 'string', 'max' => 200],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleGroup::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleStatus::className(), 'targetAttribute' => ['status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'make' => 'Make',
            'regNo' => 'Reg No',
            'chasisNo' => 'Chasis No',
            'yearMade' => 'Year Made',
            'purchaseDate' => 'Purchase Date',
            'colour' => 'Colour',
            'countryOfOrigin' => 'Country Of Origin',
            'no_passengers' => 'No Passengers',
            'cubicCentimeter' => 'Cubic Centimeter',
            'fuel' => 'Fuel',
            'engine_no' => 'Engine No',
            'vehicle_id' => 'Vehicle Group',
            'file' => 'File',
            'status' => 'Vehicle Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[AccidentRecords]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccidentRecords()
    {
        return $this->hasMany(AccidentRecords::className(), ['vehicle_id' => 'id']);
    }

    /**
     * Gets query for [[Drivers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDrivers()
    {
        return $this->hasMany(Drivers::className(), ['vehicle_id' => 'id']);
    }

    /**
     * Gets query for [[Insurances]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInsurances()
    {
        return $this->hasMany(Insurance::className(), ['vehicle_id' => 'id']);
    }

    /**
     * Gets query for [[Operations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOperations()
    {
        return $this->hasMany(Operations::className(), ['vehicle_id' => 'id']);
    }

    /**
     * Gets query for [[Reminders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReminders()
    {
        return $this->hasMany(Reminder::className(), ['vehicle_id' => 'id']);
    }

    /**
     * Gets query for [[Repairs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepairs()
    {
        return $this->hasMany(Repairs::className(), ['vehicle_id' => 'id']);
    }

    /**
     * Gets query for [[RoadWorthies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoadWorthies()
    {
        return $this->hasMany(RoadWorthy::className(), ['vehicle_id' => 'id']);
    }

    /**
     * Gets query for [[Scrabs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getScrabs()
    {
        return $this->hasMany(Scrab::className(), ['vehicle_id' => 'id']);
    }

    /**
     * Gets query for [[Servicings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServicings()
    {
        return $this->hasMany(Servicings::className(), ['vehicle_id' => 'id']);
    }

    /**
     * Gets query for [[Vehicle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(VehicleGroup::className(), ['id' => 'vehicle_id']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(VehicleStatus::className(), ['id' => 'status']);
    }
}
