<?php

namespace backend\modules\departments\models;

use Yii;

/**
 * This is the model class for table "tbl_course_depart".
 *
 * @property int $id
 * @property int $depart_id
 * @property int $course_id
 *
 * @property TblDepart $depart
 * @property TblCourse $course
 */
class TblCourseDepart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_course_depart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['depart_id', 'course_id'], 'required'],
            [['depart_id', 'course_id'], 'integer'],
            [['depart_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblDepart::className(), 'targetAttribute' => ['depart_id' => 'id']],
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
            'depart_id' => 'Department',
            'course_id' => 'Courses',
        ];
    }

    /**
     * Gets query for [[Depart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepart()
    {
        return $this->hasOne(TblDepart::className(), ['id' => 'depart_id']);
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
}
