<?php

namespace backend\modules\students\models;

use Yii;

/**
 * This is the model class for table "tbl_stud".
 *
 * @property int $id
 * @property int $personal_details_id
 * @property int $personal_address_id
 * @property int $personal_education_id
 * @property int $personal_employment_id
 * @property int $personal_document_id
 * @property int $application_type
 * @property int $status
 * @property int $user_id
 * @property int $program_id
 * @property int $date
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TblStRegistration[] $tblStRegistrations
 * @property TblStudPersDetails $personalDetails
 * @property TblStudPersAddress $personalAddress
 * @property TblStudEmployDetails $personalEmployment
 * @property TblStudEduBg $personalEducation
 * @property TblStudDoc $personalDocument
 * @property TblUser $user
 * @property TblStudTypeCategory $applicationType
 * @property TblProgram $program
 * @property TblStudStatus $status0
 * @property TblStudResult[] $tblStudResults
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
            [['personal_details_id', 'personal_address_id', 'personal_education_id', 'personal_employment_id', 'personal_document_id', 'application_type', 'status', 'user_id', 'program_id', 'date'], 'required'],
            [['personal_details_id', 'personal_address_id', 'personal_education_id', 'personal_employment_id', 'personal_document_id', 'application_type', 'status', 'user_id', 'program_id', 'date'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['personal_details_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudPersDetails::className(), 'targetAttribute' => ['personal_details_id' => 'id']],
            [['personal_address_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudPersAddress::className(), 'targetAttribute' => ['personal_address_id' => 'id']],
            [['personal_employment_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudEmployDetails::className(), 'targetAttribute' => ['personal_employment_id' => 'id']],
            [['personal_education_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudEduBg::className(), 'targetAttribute' => ['personal_education_id' => 'id']],
            [['personal_document_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudDoc::className(), 'targetAttribute' => ['personal_document_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblUser::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['application_type'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudTypeCategory::className(), 'targetAttribute' => ['application_type' => 'id']],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblProgram::className(), 'targetAttribute' => ['program_id' => 'id']],
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
            'date' => 'Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
     * Gets query for [[PersonalDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalDetails()
    {
        return $this->hasOne(TblStudPersDetails::className(), ['id' => 'personal_details_id']);
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
     * Gets query for [[PersonalEmployment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalEmployment()
    {
        return $this->hasOne(TblStudEmployDetails::className(), ['id' => 'personal_employment_id']);
    }

    /**
     * Gets query for [[PersonalEducation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalEducation()
    {
        return $this->hasOne(TblStudEduBg::className(), ['id' => 'personal_education_id']);
    }

    /**
     * Gets query for [[PersonalDocument]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalDocument()
    {
        return $this->hasOne(TblStudDoc::className(), ['id' => 'personal_document_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(TblUser::className(), ['id' => 'user_id']);
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
     * Gets query for [[Program]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(TblProgram::className(), ['id' => 'program_id']);
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
     * Gets query for [[TblStudResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudResults()
    {
        return $this->hasMany(TblStudResult::className(), ['student_id' => 'id']);
    }
}
