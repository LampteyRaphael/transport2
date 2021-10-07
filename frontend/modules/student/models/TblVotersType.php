<?php

namespace frontend\modules\student\models;

use Yii;

/**
 * This is the model class for table "tbl_voters_type".
 *
 * @property int $id
 * @property string $name
 *
 * @property TblAppAddress[] $tblAppAddresses
 * @property TblStudPersAddress[] $tblStudPersAddresses
 */
class TblVotersType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_voters_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
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
     * Gets query for [[TblAppAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppAddresses()
    {
        return $this->hasMany(TblAppAddress::className(), ['voters_id_type' => 'id']);
    }

    /**
     * Gets query for [[TblStudPersAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudPersAddresses()
    {
        return $this->hasMany(TblStudPersAddress::className(), ['voters_id_type' => 'id']);
    }
}
