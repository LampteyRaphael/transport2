<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_acadamic_year".
 *
 * @property int $id
 * @property string $date_of_admission
 * @property string|null $doa
 * @property string|null $doc
 * @property int $status
 *
 * @property TblStatusCategory $status0
 * @property TblAppAdmission[] $tblAppAdmissions
 * @property TblAppQuali[] $tblAppQualis
 */
class TblAcadamicYear extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_acadamic_year';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_of_admission', 'status'], 'required'],
            [['doa', 'doc'], 'safe'],
            [['status'], 'integer'],
            [['date_of_admission'], 'string', 'max' => 50],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => TblStatusCategory::className(), 'targetAttribute' => ['status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_of_admission' => 'Date Of Admission',
            'doa' => 'Doa',
            'doc' => 'Doc',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(TblStatusCategory::className(), ['id' => 'status']);
    }

    /**
     * Gets query for [[TblAppAdmissions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppAdmissions()
    {
        return $this->hasMany(TblAppAdmission::className(), ['accadamin_year_id' => 'id']);
    }

    /**
     * Gets query for [[TblAppQualis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppQualis()
    {
        return $this->hasMany(TblAppQuali::className(), ['accadamin_year_id' => 'id']);
    }
}
