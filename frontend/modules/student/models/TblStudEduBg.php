<?php

namespace frontend\modules\student\models;

use Yii;

/**
 * This is the model class for table "tbl_stud_edu_bg".
 *
 * @property int $id
 * @property string $institution
 * @property string $program_offered
 * @property string $index_number
 * @property string $session
 * @property string $date
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TblStud[] $tblStuds
 */
class TblStudEduBg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_stud_edu_bg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institution', 'program_offered', 'index_number', 'session', 'date'], 'required'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['institution', 'program_offered'], 'string', 'max' => 255],
            [['index_number'], 'string', 'max' => 100],
            [['session'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institution' => 'Institution',
            'program_offered' => 'Program Offered',
            'index_number' => 'Index Number',
            'session' => 'Session',
            'date' => 'Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[TblStuds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStuds()
    {
        return $this->hasMany(TblStud::className(), ['personal_education_id' => 'id']);
    }
}
