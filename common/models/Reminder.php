<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reminder".
 *
 * @property int $id
 * @property int $vehicle_id
 * @property string $date
 * @property string $message
 *
 * @property Vehicles $vehicle
 */
class Reminder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reminder';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vehicle_id', 'date', 'message'], 'required'],
            [['vehicle_id'], 'integer'],
            [['date'], 'safe'],
            [['message'], 'string'],
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
            'date' => 'Date',
            'message' => 'Message',
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
