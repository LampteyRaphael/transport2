<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_stud_grade".
 *
 * @property int $id
 * @property string $grade_name
 * @property int $grade_point
 *
 * @property TblStudResult[] $tblStudResults
 */
class TblStudGrade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_stud_grade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grade_name', 'grade_point'], 'required'],
            [['grade_point'], 'integer'],
            [['grade_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'grade_name' => 'Grade Name',
            'grade_point' => 'Grade Point',
        ];
    }

    /**
     * Gets query for [[TblStudResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudResults()
    {
        return $this->hasMany(TblStudResult::className(), ['grade_id' => 'id']);
    }
}
