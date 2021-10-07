<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_title_tb".
 *
 * @property int $id
 * @property string $name
 *
 * @property TblAppPersDetails[] $tblAppPersDetails
 * @property TblStudPersDetails[] $tblStudPersDetails
 */
class TblTitleTb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_title_tb';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 20],
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
        ];
    }

    /**
     * Gets query for [[TblAppPersDetails]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getTblAppPersDetails()
    {
        return $this->hasMany(TblAppPersDetails::className(), ['title' => 'id']);
    }

    /**
     * Gets query for [[TblStudPersDetails]].
     *
     * @return \yii\db\ActiveQuery|TblStudPersDetailsQuery
     */
    public function getTblStudPersDetails()
    {
        return $this->hasMany(TblStudPersDetails::className(), ['title' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TblCountryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblCountryQuery(get_called_class());
    }
}
