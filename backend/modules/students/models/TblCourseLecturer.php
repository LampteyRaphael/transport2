<?php

namespace backend\modules\students\models;

use Yii;

/**
 * This is the model class for table "tbl_course_lecturer".
 *
 * @property int $id
 * @property int $course_id
 * @property int $lecturer_id
 * @property int $section_id
 *
 * @property TblSection $section
 * @property TblLecturer $lecturer
 * @property TblCourse $course
 * @property TblStudResult[] $tblStudResults
 */
class TblCourseLecturer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_course_lecturer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'lecturer_id', 'section_id'], 'required'],
            [['course_id', 'lecturer_id', 'section_id'], 'integer'],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblSection::className(), 'targetAttribute' => ['section_id' => 'id']],
            [['lecturer_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblLecturer::className(), 'targetAttribute' => ['lecturer_id' => 'id']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblCourse::className(), 'targetAttribute' => ['course_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course ID',
            'lecturer_id' => 'Lecturer ID',
            'section_id' => 'Section ID',
        ];
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
     * Gets query for [[Lecturer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLecturer()
    {
        return $this->hasOne(TblLecturer::className(), ['id' => 'lecturer_id']);
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
     * Gets query for [[TblStudResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudResults()
    {
        return $this->hasMany(TblStudResult::className(), ['course_lecture_id' => 'id']);
    }
}
