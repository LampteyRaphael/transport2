<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_stud_acadamic_year".
 *
 * @property int $id
 * @property string $name
 *
 * @property TblLecturerCourse[] $tblLecturerCourses
 * @property TblRegisCourse[] $tblRegisCourses
 * @property TblStRegistration[] $tblStRegistrations
 */
class TblStudAcadamicYear extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_stud_acadamic_year';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[TblLecturerCourses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblLecturerCourses()
    {
        return $this->hasMany(TblLecturerCourse::className(), ['acadamic_year' => 'id']);
    }

    /**
     * Gets query for [[TblRegisCourses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblRegisCourses()
    {
        return $this->hasMany(TblRegisCourse::className(), ['acadamic_year' => 'id']);
    }

    /**
     * Gets query for [[TblStRegistrations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStRegistrations()
    {
        return $this->hasMany(TblStRegistration::className(), ['acadamic_year' => 'id']);
    }
}
