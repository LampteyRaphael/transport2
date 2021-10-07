<?php

namespace backend\modules\students\models;

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
 * @property int|null $program_id
 * @property int $status
 * @property string $date
 * @property int $account_id
 * @property string $created_by
 * @property string $updated_by
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TblAppPersDetails $personalDetails
 * @property TblAppEmpDetails $personalEmployment
 * @property TblAppEduBg $personalEducation
 * @property TblAppAddress $personalAddress
 * @property TblAppDocument $personalDocument
 * @property TblAppStatus $status0
 * @property TblAppProgram $program
 * @property TblAppTypeCategory $applicationType
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
            [['personal_details_id', 'personal_address_id', 'personal_education_id', 'personal_employment_id', 'personal_document_id', 'application_type', 'status', 'date', 'account_id', 'created_by', 'updated_by'], 'required'],
            [['personal_details_id', 'personal_address_id', 'personal_education_id', 'personal_employment_id', 'personal_document_id', 'application_type', 'program_id', 'status', 'account_id'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'string', 'max' => 100],
            [['personal_details_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppPersDetails::className(), 'targetAttribute' => ['personal_details_id' => 'id']],
            [['personal_employment_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppEmpDetails::className(), 'targetAttribute' => ['personal_employment_id' => 'id']],
            [['personal_education_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppEduBg::className(), 'targetAttribute' => ['personal_education_id' => 'id']],
            [['personal_address_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppAddress::className(), 'targetAttribute' => ['personal_address_id' => 'id']],
            [['personal_document_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppDocument::className(), 'targetAttribute' => ['personal_document_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppStatus::className(), 'targetAttribute' => ['status' => 'id']],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppProgram::className(), 'targetAttribute' => ['program_id' => 'id']],
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
            'date' => 'Date',
            'account_id' => 'Account ID',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
     * Gets query for [[PersonalEmployment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalEmployment()
    {
        return $this->hasOne(TblAppEmpDetails::className(), ['id' => 'personal_employment_id']);
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
     * Gets query for [[PersonalAddress]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalAddress()
    {
        return $this->hasOne(TblAppAddress::className(), ['id' => 'personal_address_id']);
    }

    /**
     * Gets query for [[PersonalDocument]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalDocument()
    {
        return $this->hasOne(TblAppDocument::className(), ['id' => 'personal_document_id']);
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
     * Gets query for [[Program]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(TblAppProgram::className(), ['id' => 'program_id']);
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
