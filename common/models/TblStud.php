<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_stud".
 *
 * @property int $id
 * @property int $personal_details_id
 * @property int $personal_address_id
 * @property int $personal_education_id
 * @property int $personal_employment_id
 * @property int|null $personal_document_id
 * @property int $application_type
 * @property int $status
 * @property int $user_id
 * @property int|null $program_id
 * @property string|null $dates
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property TblStudTypeCategory $applicationType
 * @property TblStudPersAddress $personalAddress
 * @property TblStudPersDetails $personalDetails
 * @property TblStudPersDetails $personalDocument
 * @property TblStudPersDetails $personalEducation
 * @property TblStudPersDetails $personalEmployment
 * @property TblStudPersDetails $program
 * @property TblStudStatus $status0
 * @property TblStRegistration[] $tblStRegistrations
 * @property TblStudAdmis[] $tblStudAdmis
 * @property TblStudsResult[] $tblStudsResults
 * @property TblUser $user
 */
class TblStud extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_stud';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['personal_details_id', 'personal_address_id', 'personal_education_id', 'personal_employment_id', 'application_type', 'status', 'user_id'], 'required'],
            [['personal_details_id', 'personal_address_id', 'personal_education_id', 'personal_employment_id', 'personal_document_id', 'application_type', 'status', 'user_id', 'program_id'], 'integer'],
            [['dates', 'created_at', 'updated_at'], 'safe'],
            [['personal_details_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudPersDetails::className(), 'targetAttribute' => ['personal_details_id' => 'id']],
            [['personal_education_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudPersDetails::className(), 'targetAttribute' => ['personal_education_id' => 'id']],
            [['personal_employment_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudPersDetails::className(), 'targetAttribute' => ['personal_employment_id' => 'id']],
            [['personal_document_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudPersDetails::className(), 'targetAttribute' => ['personal_document_id' => 'id']],
            [['personal_address_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudPersAddress::className(), 'targetAttribute' => ['personal_address_id' => 'id']],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudPersDetails::className(), 'targetAttribute' => ['program_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['application_type'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudTypeCategory::className(), 'targetAttribute' => ['application_type' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudStatus::className(), 'targetAttribute' => ['status' => 'id']],
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
            'status' => 'Status',
            'user_id' => 'User ID',
            'program_id' => 'Program ID',
            'dates' => 'Dates',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[ApplicationType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplicationType()
    {
        return $this->hasOne(TblStudTypeCategory::className(), ['id' => 'application_type']);
    }

    /**
     * Gets query for [[PersonalAddress]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalAddress()
    {
        return $this->hasOne(TblStudPersAddress::className(), ['id' => 'personal_address_id']);
    }

    /**
     * Gets query for [[PersonalDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalDetails()
    {
        return $this->hasOne(TblStudPersDetails::className(), ['id' => 'personal_details_id']);
    }

    /**
     * Gets query for [[PersonalDocument]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalDocument()
    {
        return $this->hasOne(TblStudPersDetails::className(), ['id' => 'personal_document_id']);
    }

    /**
     * Gets query for [[PersonalEducation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalEducation()
    {
        return $this->hasOne(TblStudPersDetails::className(), ['id' => 'personal_education_id']);
    }

    /**
     * Gets query for [[PersonalEmployment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalEmployment()
    {
        return $this->hasOne(TblStudPersDetails::className(), ['id' => 'personal_employment_id']);
    }

    /**
     * Gets query for [[Program]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(TblStudPersDetails::className(), ['id' => 'program_id']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(TblStudStatus::className(), ['id' => 'status']);
    }

    /**
     * Gets query for [[TblStRegistrations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStRegistrations()
    {
        return $this->hasMany(TblStRegistration::className(), ['stud_Id' => 'id']);
    }

    /**
     * Gets query for [[TblStudAdmis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudAdmis()
    {
        return $this->hasMany(TblStudAdmis::className(), ['students_id' => 'id']);
    }

    /**
     * Gets query for [[TblStudsResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudsResults()
    {
        return $this->hasMany(TblStudsResult::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
