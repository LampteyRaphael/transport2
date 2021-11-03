<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_osn".
 *
 * @property int $id
 * @property string|null $osn_number
 * @property int|null $status
 * @property string|null $year
 * @property string|null $transaction_no
 *
 * @property TblAppAddress[] $tblAppAddresses
 * @property TblAppDocument[] $tblAppDocuments
 * @property TblAppEduBg[] $tblAppEduBgs
 * @property TblAppEmpDetails[] $tblAppEmpDetails
 * @property TblAppPersDetails[] $tblAppPersDetails
 * @property TblAppProgram[] $tblAppPrograms
 * @property TblApp[] $tblApps
 */
class TblOsn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_osn';
    }

    public $file,$studOption,$options;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['year'], 'safe'],
            [['file'],'file'],
            [['osn_number', 'transaction_no'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'osn_number' => 'Osn Number',
            'status' => 'Status',
            'year' => 'Year',
            'transaction_no' => 'Transaction No',
        ];
    }

    /**
     * Gets query for [[TblAppAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppAddresses()
    {
        return $this->hasMany(TblAppAddress::className(), ['osn_id' => 'id']);
    }

    /**
     * Gets query for [[TblAppDocuments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppDocuments()
    {
        return $this->hasMany(TblAppDocument::className(), ['osn_id' => 'id']);
    }

    /**
     * Gets query for [[TblAppEduBgs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppEduBgs()
    {
        return $this->hasMany(TblAppEduBg::className(), ['osn_id' => 'id']);
    }

    /**
     * Gets query for [[TblAppEmpDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppEmpDetails()
    {
        return $this->hasMany(TblAppEmpDetails::className(), ['osn_id' => 'id']);
    }

    /**
     * Gets query for [[TblAppPersDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppPersDetails()
    {
        return $this->hasMany(TblAppPersDetails::className(), ['osn_id' => 'id']);
    }

    /**
     * Gets query for [[TblAppPrograms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppPrograms()
    {
        return $this->hasMany(TblAppProgram::className(), ['osn_id' => 'id']);
    }

    /**
     * Gets query for [[TblApps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblApps()
    {
        return $this->hasMany(TblApp::className(), ['osn' => 'id']);
    }
}
