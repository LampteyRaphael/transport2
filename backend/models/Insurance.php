<?php

namespace app\models;

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
            [['renewalDate', 'expiringDate', 'vehicle_id'], 'required'],
            [['renewalDate', 'expiringDate', 'created_at', 'updated_at'], 'safe'],
            [['vehicle_id'], 'integer'],
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
            'renewalDate' => 'Renewal Date',
            'expiringDate' => 'Expiring Date',
            'vehicle_id' => 'Vehicle ID',
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
}
