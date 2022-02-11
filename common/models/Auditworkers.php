<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "auditworkers".
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string|null $phoneNumber
 * @property string|null $audit_photos_id
 * @property string|null $photo_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Auditworkers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auditworkers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email', 'phoneNumber', 'audit_photos_id', 'photo_id'], 'string', 'max' => 255],
            [['email'], 'unique'],
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
            'email' => 'Email',
            'phoneNumber' => 'Phone Number',
            'audit_photos_id' => 'Audit Photos ID',
            'photo_id' => 'Photo ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
