<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_osn".
 *
 * @property int $id
 * @property int $osn_number
 * @property int $status
 * @property string $year
 * @property string $transaction_no
 *
 * @property TblApp[] $tblApps
 * @property TblAppAddress[] $tblAppAddresses
 * @property TblAppDocument[] $tblAppDocuments
 * @property TblAppEduBg[] $tblAppEduBgs
 * @property TblAppEmpDetails[] $tblAppEmpDetails
 * @property TblAppPersDetails[] $tblAppPersDetails
 * @property TblAppStudProgram[] $tblAppStudPrograms
 */
class TblOsn extends \yii\db\ActiveRecord
{
    public $studOption,$options;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_osn';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['osn_number', 'status', 'year', 'transaction_no'], 'required'],
            [['osn_number', 'status'], 'integer'],
            [['year'], 'safe'],
            [['transaction_no'], 'string', 'max' => 20],
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
     * Gets query for [[TblApps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblApps()
    {
        return $this->hasMany(TblApp::className(), ['osn' => 'id']);
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
     * Gets query for [[TblAppStudPrograms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppStudPrograms()
    {
        return $this->hasMany(TblAppStudProgram::className(), ['osn_id' => 'id']);
    }
}
