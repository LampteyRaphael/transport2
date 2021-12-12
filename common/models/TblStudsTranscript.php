<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_studs_transcript".
 *
 * @property int $id
 * @property int $student_id
 * @property int $student_result_id
 * @property int $course_id
 * @property int $semester
 * @property int $section_id
 * @property int|null $class_marks
 * @property int|null $exams_marks
 * @property int|null $total_marks
 * @property int $grade_id
 * @property int $status
 * @property string $date_of_entry
 * @property int $course_lecture_id
 * @property int $acadamic_year
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property TblStudRegistYear $acadamicYear
 * @property TblCourse $course
 * @property TblCourseLecturer $courseLecture
 * @property TblStudGrade $grade
 * @property TblSection $section
 * @property TblSemester $semester0
 * @property TblStudResultCategory $status0
 * @property TblStud $student
 * @property TblStudsResult $studentResult
 */
class TblStudsTranscript extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_studs_transcript';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'student_result_id', 'course_id', 'semester', 'section_id', 'grade_id', 'status', 'date_of_entry', 'course_lecture_id', 'acadamic_year'], 'required'],
            [['student_id', 'student_result_id', 'course_id', 'semester', 'section_id', 'class_marks', 'exams_marks', 'total_marks', 'grade_id', 'status', 'course_lecture_id', 'acadamic_year'], 'integer'],
            [['date_of_entry', 'created_at', 'updated_at'], 'safe'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblCourse::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStud::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblSection::className(), 'targetAttribute' => ['section_id' => 'id']],
            [['semester'], 'exist', 'skipOnError' => true, 'targetClass' => TblSemester::className(), 'targetAttribute' => ['semester' => 'id']],
            [['grade_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudGrade::className(), 'targetAttribute' => ['grade_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudResultCategory::className(), 'targetAttribute' => ['status' => 'id']],
            [['course_lecture_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblCourseLecturer::className(), 'targetAttribute' => ['course_lecture_id' => 'id']],
            [['acadamic_year'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudRegistYear::className(), 'targetAttribute' => ['acadamic_year' => 'id']],
            [['student_result_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudsResult::className(), 'targetAttribute' => ['student_result_id' => 'id']],
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
            'student_result_id' => 'Student Result ID',
            'course_id' => 'Course ID',
            'semester' => 'Semester',
            'section_id' => 'Section ID',
            'class_marks' => 'Class Marks',
            'exams_marks' => 'Exams Marks',
            'total_marks' => 'Total Marks',
            'grade_id' => 'Grade ID',
            'status' => 'Status',
            'date_of_entry' => 'Date Of Entry',
            'course_lecture_id' => 'Course Lecture ID',
            'acadamic_year' => 'Acadamic Year',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[AcadamicYear]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcadamicYear()
    {
        return $this->hasOne(TblStudRegistYear::className(), ['id' => 'acadamic_year']);
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
     * Gets query for [[CourseLecture]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourseLecture()
    {
        return $this->hasOne(TblCourseLecturer::className(), ['id' => 'course_lecture_id']);
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
     * Gets query for [[Section]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(TblSection::className(), ['id' => 'section_id']);
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
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(TblStudResultCategory::className(), ['id' => 'status']);
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
     * Gets query for [[StudentResult]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentResult()
    {
        return $this->hasOne(TblStudsResult::className(), ['id' => 'student_result_id']);
    }
}
