<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_app".
 *
 * @property int $id
 * @property int $personal_details_id
 * @property int $personal_address_id
 * @property int $personal_education_id
 * @property int $personal_employment_id
 * @property int $personal_document_id
 * @property int $application_type
 * @property int $program_id
 * @property int $status
 * @property int $osn
 * @property string|null $date
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $account_id
 *
 * @property TblAppTypeCategory $applicationType
 * @property TblOsn $osn0
 * @property TblAppAddress $personalAddress
 * @property TblAppPersDetails $personalDetails
 * @property TblAppDocument $personalDocument
 * @property TblAppEduBg $personalEducation
 * @property TblAppEmpDetails $personalEmployment
 * @property TblAppProgram $program
 * @property TblAppStatus $status0
 * @property TblAppAdmission[] $tblAppAdmissions
 * @property TblAppQuali[] $tblAppQualis
 * @property TblAppStatusLog[] $tblAppStatusLogs
 */
class TblApp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_app';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['personal_details_id', 'personal_address_id', 'personal_education_id', 'personal_employment_id', 'personal_document_id', 'application_type', 'program_id', 'status', 'osn'], 'required'],
            [['personal_details_id', 'personal_address_id', 'personal_education_id', 'personal_employment_id', 'personal_document_id', 'application_type', 'program_id', 'status', 'osn', 'created_by', 'updated_by', 'account_id'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['osn'], 'exist', 'skipOnError' => true, 'targetClass' => TblOsn::className(), 'targetAttribute' => ['osn' => 'id']],
            [['personal_details_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppPersDetails::className(), 'targetAttribute' => ['personal_details_id' => 'id']],
            [['personal_document_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppDocument::className(), 'targetAttribute' => ['personal_document_id' => 'personalDetail_id']],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppProgram::className(), 'targetAttribute' => ['program_id' => 'id']],
            [['personal_employment_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppEmpDetails::className(), 'targetAttribute' => ['personal_employment_id' => 'id']],
            [['personal_education_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppEduBg::className(), 'targetAttribute' => ['personal_education_id' => 'id']],
            [['personal_address_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppAddress::className(), 'targetAttribute' => ['personal_address_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppStatus::className(), 'targetAttribute' => ['status' => 'id']],
            [['application_type'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppTypeCategory::className(), 'targetAttribute' => ['application_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'personal_details_id' => 'Personal Details ID',
            'personal_address_id' => 'Personal Address ID',
            'personal_education_id' => 'Personal Education ID',
            'personal_employment_id' => 'Personal Employment ID',
            'personal_document_id' => 'Personal Document ID',
            'application_type' => 'Application Type',
            'program_id' => 'Program ID',
            'status' => 'Status',
            'osn' => 'Osn',
            'date' => 'Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'account_id' => 'Account ID',
        ];
    }

    /**
     * Gets query for [[ApplicationType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplicationType()
    {
        return $this->hasOne(TblAppTypeCategory::className(), ['id' => 'application_type']);
    }

    /**
     * Gets query for [[Osn0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOsn0()
    {
        return $this->hasOne(TblOsn::className(), ['id' => 'osn']);
    }

    /**
     * Gets query for [[PersonalAddress]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalAddress()
    {
        return $this->hasOne(TblAppAddress::className(), ['id' => 'personal_address_id']);
    }

    /**
     * Gets query for [[PersonalDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalDetails()
    {
        return $this->hasOne(TblAppPersDetails::className(), ['id' => 'personal_details_id']);
    }

    /**
     * Gets query for [[PersonalDocument]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalDocument()
    {
        return $this->hasOne(TblAppDocument::className(), ['personalDetail_id' => 'personal_document_id']);
    }

    /**
     * Gets query for [[PersonalEducation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalEducation()
    {
        return $this->hasOne(TblAppEduBg::className(), ['id' => 'personal_education_id']);
    }

    /**
     * Gets query for [[PersonalEmployment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalEmployment()
    {
        return $this->hasOne(TblAppEmpDetails::className(), ['id' => 'personal_employment_id']);
    }

    /**
     * Gets query for [[Program]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(TblAppProgram::className(), ['id' => 'program_id']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(TblAppStatus::className(), ['id' => 'status']);
    }

    /**
     * Gets query for [[TblAppAdmissions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppAdmissions()
    {
        return $this->hasMany(TblAppAdmission::className(), ['application_id' => 'id']);
    }

    /**
     * Gets query for [[TblAppQualis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppQualis()
    {
        return $this->hasMany(TblAppQuali::className(), ['application_id' => 'id']);
    }

    /**
     * Gets query for [[TblAppStatusLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppStatusLogs()
    {
        return $this->hasMany(TblAppStatusLog::className(), ['status' => 'status']);
    }
}
