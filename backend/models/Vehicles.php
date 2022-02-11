<?php

namespace app\models;

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
 * @property string|null $cubicCentimeter
 * @property string|null $fuel
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Drivers[] $drivers
 * @property Operations[] $operations
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
            [['make', 'regNo', 'chasisNo','yearMade', 'purchaseDate', 'colour', 'countryOfOrigin', 'cubicCentimeter', 'fuel'], 'required'],
            [['make', 'regNo', 'chasisNo'],'unique'],
            [['yearMade', 'purchaseDate', 'created_at', 'updated_at'], 'safe'],
            [['make', 'regNo', 'chasisNo', 'colour', 'countryOfOrigin', 'cubicCentimeter', 'fuel'], 'string', 'max' => 255],
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
            'cubicCentimeter' => 'Cubic Centimeter',
            'fuel' => 'Fuel',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
     * Gets query for [[Operations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOperations()
    {
        return $this->hasMany(Operations::className(), ['vehicle_id' => 'id']);
    }
}
