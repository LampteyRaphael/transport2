<?php

namespace frontend\modules\student\models;

use Yii;

/**
 * This is the model class for table "tbl_country".
 *
 * @property string|null $country
 * @property string|null $currency
 * @property string|null $code
 * @property string|null $symbol
 * @property int $id
 *
 * @property TblAppAddress[] $tblAppAddresses
 * @property TblStudPersAddress[] $tblStudPersAddresses
 */
class TblCountry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country', 'currency', 'code', 'symbol'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'country' => 'Country',
            'currency' => 'Currency',
            'code' => 'Code',
            'symbol' => 'Symbol',
            'id' => 'ID',
        ];
    }

    /**
     * Gets query for [[TblAppAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppAddresses()
    {
        return $this->hasMany(TblAppAddress::className(), ['country' => 'id']);
    }

    /**
     * Gets query for [[TblStudPersAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudPersAddresses()
    {
        return $this->hasMany(TblStudPersAddress::className(), ['country' => 'id']);
    }
}
