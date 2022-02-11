<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accident_records".
 *
 * @property int $id
 * @property string $dateOfIncident
 * @property int $driver_id
 * @property int|null $nameOfOfficer
 * @property string $description
 * @property string $actionTaken
 * @property string|null $policeReport
 * @property string|null $remedy
 * @property int $vehicle_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Drivers $driver
 * @property Vehicles $vehicle
 * @property User $nameOfOfficer0
 */
class AccidentRecords extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accident_records';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dateOfIncident', 'driver_id', 'description', 'actionTaken', 'vehicle_id'], 'required'],
            [['dateOfIncident', 'created_at', 'updated_at'], 'safe'],
            [['driver_id', 'nameOfOfficer', 'vehicle_id'], 'integer'],
            [['description', 'actionTaken', 'policeReport', 'remedy'], 'string', 'max' => 255],
            [['driver_id'], 'exist', 'skipOnError' => true, 'targetClass' => Drivers::className(), 'targetAttribute' => ['driver_id' => 'id']],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicles::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
            [['nameOfOfficer'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['nameOfOfficer' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dateOfIncident' => 'Date Of Incident',
            'driver_id' => 'Driver ID',
            'nameOfOfficer' => 'Name Of Officer',
            'description' => 'Description',
            'actionTaken' => 'Action Taken',
            'policeReport' => 'Police Report',
            'remedy' => 'Remedy',
            'vehicle_id' => 'Vehicle ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
     * Gets query for [[NameOfOfficer0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNameOfOfficer0()
    {
        return $this->hasOne(User::className(), ['id' => 'nameOfOfficer']);
    }
}
