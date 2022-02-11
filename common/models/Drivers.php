<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "drivers".
 *
 * @property int $id
 * @property string $name
 * @property string $tel
 * @property int $age
 * @property string $email
 * @property int $license_no
 * @property string $license_expire_date
 * @property string $date_of_join
 * @property int $driver_status
 * @property int $vehicle_id
 * @property string|null $photo
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $total_experience
 *
 * @property AccidentRecords[] $accidentRecords
 * @property Vehicles $vehicle
 * @property ActiveStatus $driverStatus
 * @property Operations[] $operations
 * @property Repairs[] $repairs
 * @property Servicings[] $servicings
 */
class Drivers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'drivers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'tel', 'age', 'email', 'license_no', 'license_expire_date', 'date_of_join', 'driver_status', 'total_experience'], 'required'],
            [['age', 'license_no', 'driver_status', 'vehicle_id', 'total_experience'], 'integer'],
            [['photo'],'file'],
            [['email'],'email'],
            [['license_expire_date', 'date_of_join', 'created_at', 'updated_at'], 'safe'],
            [['name', 'tel', 'email', 'photo'], 'string', 'max' => 255],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicles::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
            [['driver_status'], 'exist', 'skipOnError' => true, 'targetClass' => ActiveStatus::className(), 'targetAttribute' => ['driver_status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'tel' => 'Tel',
            'age' => 'Age',
            'email' => 'Email',
            'license_no' => 'License No',
            'license_expire_date' => 'License Expire Date',
            'date_of_join' => 'Date Of Join',
            'driver_status' => 'Driver Status',
            'vehicle_id' => 'Vehicle',
            'photo' => 'Photo',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'total_experience' => 'Total Experience',
        ];
    }

    /**
     * Gets query for [[AccidentRecords]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccidentRecords()
    {
        return $this->hasMany(AccidentRecords::className(), ['driver_id' => 'id']);
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
     * Gets query for [[DriverStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDriverStatus()
    {
        return $this->hasOne(ActiveStatus::className(), ['id' => 'driver_status']);
    }

    /**
     * Gets query for [[Operations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOperations()
    {
        return $this->hasMany(Operations::className(), ['driver_id' => 'id']);
    }

    /**
     * Gets query for [[Repairs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepairs()
    {
        return $this->hasMany(Repairs::className(), ['driver_id' => 'id']);
    }

    /**
     * Gets query for [[Servicings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServicings()
    {
        return $this->hasMany(Servicings::className(), ['driver_id' => 'id']);
    }
}
