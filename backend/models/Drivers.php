<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "drivers".
 *
 * @property int $id
 * @property string $name
 * @property string $tel
 * @property string $email
 * @property int $vehicle_id
 * @property string|null $created_at
 * @property string|null $updated_at
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
            [['name', 'tel', 'email', 'vehicle_id'], 'required'],
            [['vehicle_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'tel', 'email'], 'string', 'max' => 255],
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
            'email' => 'Email',
            'vehicle_id' => 'Vehicle',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
