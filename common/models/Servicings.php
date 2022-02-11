<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "servicings".
 *
 * @property int $id
 * @property string $description
 * @property float|null $amount
 * @property string $garageName
 * @property string $datePresented
 * @property string|null $dateReturned
 * @property int $user_id
 * @property int $driver_id
 * @property int $vehicle_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Vehicles $vehicle
 * @property User $user
 * @property Drivers $driver
 */
class Servicings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servicings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'garageName', 'datePresented', 'user_id', 'driver_id', 'vehicle_id'], 'required'],
            [['amount'], 'number'],
            [['datePresented', 'dateReturned', 'created_at', 'updated_at'], 'safe'],
            [['user_id', 'driver_id', 'vehicle_id'], 'integer'],
            [['description', 'garageName'], 'string', 'max' => 255],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicles::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'description' => 'Description',
            'amount' => 'Amount',
            'garageName' => 'Garage Name',
            'datePresented' => 'Date Presented',
            'dateReturned' => 'Date Returned',
            'user_id' => 'User',
            'driver_id' => 'Driver',
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
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
