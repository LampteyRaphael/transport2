<?php

namespace backend\modules\students\models;

use Yii;

/**
 * This is the model class for table "tbl_stud_result".
 *
 * @property int $id
 * @property int $student_id
 * @property int $program_id
 * @property int $course_id
 * @property int $section_id
 * @property int $grade_id
 * @property int $auth_id
 * @property int $course_lecture_id
 * @property string $date_of_entry
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TblProgram $program
 * @property TblCourse $course
 * @property TblSection $section
 * @property TblStudGrade $grade
 * @property TblCourseLecturer $courseLecture
 * @property TblStud $student
 * @property TblStudResultCategory $status0
 * @property TblUser $auth
 */
class TblStudResult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_stud_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'program_id', 'course_id', 'section_id', 'grade_id', 'auth_id', 'course_lecture_id', 'date_of_entry', 'status'], 'required'],
            [['student_id', 'program_id', 'course_id', 'section_id', 'grade_id', 'auth_id', 'course_lecture_id', 'status'], 'integer'],
            [['date_of_entry', 'created_at', 'updated_at'], 'safe'],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblProgram::className(), 'targetAttribute' => ['program_id' => 'id']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblCourse::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblSection::className(), 'targetAttribute' => ['section_id' => 'id']],
            [['grade_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudGrade::className(), 'targetAttribute' => ['grade_id' => 'id']],
            [['course_lecture_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblCourseLecturer::className(), 'targetAttribute' => ['course_lecture_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStud::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudResultCategory::className(), 'targetAttribute' => ['status' => 'id']],
            [['auth_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblUser::className(), 'targetAttribute' => ['auth_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'program_id' => 'Program ID',
            'course_id' => 'Course ID',
            'section_id' => 'Section ID',
            'grade_id' => 'Grade ID',
            'auth_id' => 'Auth ID',
            'course_lecture_id' => 'Course Lecture ID',
            'date_of_entry' => 'Date Of Entry',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(TblCourse::className(), ['id' => 'course_id']);
    }

    /**
     * Gets query for [[Section]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(TblSection::className(), ['id' => 'section_id']);
    }

    /**
     * Gets query for [[Grade]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrade()
    {
        return $this->hasOne(TblStudGrade::className(), ['id' => 'grade_id']);
    }

    /**
     * Gets query for [[CourseLecture]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourseLecture()
    {
        return $this->hasOne(TblCourseLecturer::className(), ['id' => 'course_lecture_id']);
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(TblStud::className(), ['id' => 'student_id']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(TblStudResultCategory::className(), ['id' => 'status']);
    }

    /**
     * Gets query for [[Auth]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuth()
    {
        return $this->hasOne(TblUser::className(), ['id' => 'auth_id']);
    }
}
