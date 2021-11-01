<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_studs_result".
 *
 * @property int $id
 * @property int $student_id
 * @property int $course_id
 * @property int $semester
 * @property int $section_id
 * @property int $marks
 * @property int $grade_id
 * @property int $status
 * @property string $date_of_entry
 * @property int $course_lecture_id
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property TblCourse $course
 * @property TblLecturer $courseLecture
 * @property TblStudGrade $grade
 * @property TblSection $section
 * @property TblSemester $semester0
 * @property TblStudResultCategory $status0
 * @property TblStud $student
 */
class TblStudsResult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_studs_result';
    }

    public $file;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'course_id', 'semester', 'section_id', 'marks', 'grade_id', 'status', 'date_of_entry', 'course_lecture_id'], 'required'],
            [['student_id', 'course_id', 'semester', 'section_id', 'marks', 'grade_id', 'status', 'course_lecture_id'], 'integer'],
            [['date_of_entry', 'created_at', 'updated_at'], 'safe'],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStud::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblCourse::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblSection::className(), 'targetAttribute' => ['section_id' => 'id']],
            [['semester'], 'exist', 'skipOnError' => true, 'targetClass' => TblSemester::className(), 'targetAttribute' => ['semester' => 'id']],
            [['grade_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudGrade::className(), 'targetAttribute' => ['grade_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudResultCategory::className(), 'targetAttribute' => ['status' => 'id']],
            [['course_lecture_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblLecturer::className(), 'targetAttribute' => ['course_lecture_id' => 'id']],
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
            'course_id' => 'Course ID',
            'semester' => 'Semester',
            'section_id' => 'Section ID',
            'marks' => 'Marks',
            'grade_id' => 'Grade ID',
            'status' => 'Status',
            'date_of_entry' => 'Date Of Entry',
            'course_lecture_id' => 'Course Lecture ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
        return $this->hasOne(TblLecturer::className(), ['id' => 'course_lecture_id']);
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
}
