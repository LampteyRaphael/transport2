<?php

namespace backend\modules\students\models;

use Yii;

/**
 * This is the model class for table "tbl_st_registration".
 *
 * @property int $id
 * @property int $stud_Id
 * @property int $program_id
 * @property int $acadamic_year
 * @property int $status
 * @property int $semester
 * @property string $date_o_regis
 * @property int $courese_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TblRegisCourse[] $tblRegisCourses
 * @property TblStudAcadamicYear $acadamicYear
 * @property TblStud $stud
 * @property TblStudStatus $status0
 * @property TblSemester $semester0
 * @property TblCourse $courese
 * @property TblProgram $program
 * @property TblStudRegisLog[] $tblStudRegisLogs
 */
class TblStRegistration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_st_registration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stud_Id', 'program_id', 'acadamic_year', 'status', 'semester', 'date_o_regis', 'courese_id'], 'required'],
            [['stud_Id', 'program_id', 'acadamic_year', 'status', 'semester', 'courese_id'], 'integer'],
            [['date_o_regis', 'created_at', 'updated_at'], 'safe'],
            [['acadamic_year'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudAcadamicYear::className(), 'targetAttribute' => ['acadamic_year' => 'id']],
            [['stud_Id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStud::className(), 'targetAttribute' => ['stud_Id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudStatus::className(), 'targetAttribute' => ['status' => 'id']],
            [['semester'], 'exist', 'skipOnError' => true, 'targetClass' => TblSemester::className(), 'targetAttribute' => ['semester' => 'id']],
            [['courese_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblCourse::className(), 'targetAttribute' => ['courese_id' => 'id']],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblProgram::className(), 'targetAttribute' => ['program_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stud_Id' => 'Stud ID',
            'program_id' => 'Program ID',
            'acadamic_year' => 'Acadamic Year',
            'status' => 'Status',
            'semester' => 'Semester',
            'date_o_regis' => 'Date O Regis',
            'courese_id' => 'Courese ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[TblRegisCourses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblRegisCourses()
    {
        return $this->hasMany(TblRegisCourse::className(), ['stud_regis_id' => 'id']);
    }

    /**
     * Gets query for [[AcadamicYear]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcadamicYear()
    {
        return $this->hasOne(TblStudAcadamicYear::className(), ['id' => 'acadamic_year']);
    }

    /**
     * Gets query for [[Stud]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStud()
    {
        return $this->hasOne(TblStud::className(), ['id' => 'stud_Id']);
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
     * Gets query for [[Semester0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSemester0()
    {
        return $this->hasOne(TblSemester::className(), ['id' => 'semester']);
    }

    /**
     * Gets query for [[Courese]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourese()
    {
        return $this->hasOne(TblCourse::className(), ['id' => 'courese_id']);
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
     * Gets query for [[TblStudRegisLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudRegisLogs()
    {
        return $this->hasMany(TblStudRegisLog::className(), ['status' => 'status']);
    }
}
