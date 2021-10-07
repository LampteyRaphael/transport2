<?php

namespace backend\modules\courses\models;

use Yii;

/**
 * This is the model class for table "tbl_course".
 *
 * @property int $id
 * @property string $courseName
 * @property string $course_number
 * @property string $level
 * @property int|null $semester
 * @property int $section_id
 * @property int $program_id
 * @property string|null $course_description
 * @property string $date
 * @property string $required_courses
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TblProgram $program
 * @property TblSection $section
 * @property TblSemester $semester0
 * @property TblCourseDepart[] $tblCourseDeparts
 * @property TblCourseLecturer[] $tblCourseLecturers
 * @property TblRegisCourse[] $tblRegisCourses
 * @property TblStRegistration[] $tblStRegistrations
 * @property TblStudResult[] $tblStudResults
 */
class TblCourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['courseName', 'course_number', 'section_id', 'program_id', 'date', 'required_courses'], 'required'],
            [['semester', 'section_id', 'program_id'], 'integer'],
            [['course_description'], 'string'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['courseName', 'level', 'required_courses'], 'string', 'max' => 255],
            [['course_number'], 'string', 'max' => 100],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblProgram::className(), 'targetAttribute' => ['program_id' => 'id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblSection::className(), 'targetAttribute' => ['section_id' => 'id']],
            [['semester'], 'exist', 'skipOnError' => true, 'targetClass' => TblSemester::className(), 'targetAttribute' => ['semester' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'courseName' => 'Course Name',
            'course_number' => 'Course Code',
            // 'level' => 'Level',
            'semester' => 'Semester',
            'section_id' => 'Section ID',
            'program_id' => 'Program ID',
            'course_description' => 'Course Description',
            'date' => 'Date',
            'required_courses' => 'Required Courses',
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
     * Gets query for [[TblCourseDeparts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblCourseDeparts()
    {
        return $this->hasMany(TblCourseDepart::className(), ['course_id' => 'id']);
    }

    /**
     * Gets query for [[TblCourseLecturers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblCourseLecturers()
    {
        return $this->hasMany(TblCourseLecturer::className(), ['course_id' => 'id']);
    }

    /**
     * Gets query for [[TblRegisCourses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblRegisCourses()
    {
        return $this->hasMany(TblRegisCourse::className(), ['course_id' => 'id']);
    }

    /**
     * Gets query for [[TblStRegistrations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStRegistrations()
    {
        return $this->hasMany(TblStRegistration::className(), ['courese_id' => 'id']);
    }

    /**
     * Gets query for [[TblStudResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudResults()
    {
        return $this->hasMany(TblStudResult::className(), ['course_id' => 'id']);
    }
}
