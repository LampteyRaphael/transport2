<?php

namespace backend\modules\students\models;

use Yii;

/**
 * This is the model class for table "tbl_stud_pers_address".
 *
 * @property int $id
 * @property string $address
 * @property string $city
 * @property int|null $voters_id
 * @property int|null $gps
 * @property string $country
 * @property string|null $email
 * @property int $telephone_number
 *
 * @property TblStud[] $tblStuds
 */
class TblStudPersAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_stud_pers_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'city', 'country', 'telephone_number'], 'required'],
            [['voters_id', 'gps', 'telephone_number'], 'integer'],
            [['address', 'city', 'country', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'city' => 'City',
            'voters_id' => 'Voters ID',
            'gps' => 'Gps',
            'country' => 'Country',
            'email' => 'Email',
            'telephone_number' => 'Telephone Number',
        ];
    }

    /**
     * Gets query for [[TblStuds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStuds()
    {
        return $this->hasMany(TblStud::className(), ['personal_address_id' => 'id']);
    }
}
