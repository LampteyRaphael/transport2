<?php

namespace common\program\models;

use common\models\TblCourse;
use common\models\TblLevel;
use common\models\TblProgramType;
use common\models\TblStRegistration;
use common\models\TblStud;
use common\models\TblStudResult;
use Yii;

/**
 * This is the model class for table "tbl_program".
 *
 * @property int $id
 * @property string $program_name
 * @property string $program_code
 * @property float|null $amount
 * @property int $program_category_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TblCourse[] $tblCourses
 * @property TblLecturer[] $tblLecturers
 * @property TblProgramType $programCategory
 * @property TblStRegistration[] $tblStRegistrations
 * @property TblStud[] $tblStuds
 * @property TblStudResult[] $tblStudResults
 */
class TblProgram extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_program';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['program_name', 'program_code', 'program_category_id','level_id'], 'required'],
            [['amount'], 'number'],
            [['program_category_id','level_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['program_name'], 'string', 'max' => 255],
            [['program_code'], 'string', 'max' => 50],
            [['program_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblProgramType::className(), 'targetAttribute' => ['program_category_id' => 'id']],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblLevel::className(), 'targetAttribute' => ['level_id' => 'id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'program_name' => 'Program Name',
            'program_code' => 'Program Code',
            'amount' => 'Amount',
            'program_category_id' => 'Program Category',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[TblCourses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblCourses()
    {
        return $this->hasMany(TblCourse::className(), ['program_id' => 'id']);
    }

    /**
     * Gets query for [[TblLecturers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblLecturers()
    {
        return $this->hasMany(TblLecturer::className(), ['progrm_id' => 'id']);
    }

    /**
     * Gets query for [[ProgramCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgramCategory()
    {
        return $this->hasOne(TblProgramType::className(), ['id' => 'program_category_id']);
    }



  
   public function getLevel()
   {
       return $this->hasOne(TblLevel::className(), ['id' => 'level_id']);
   }

    /**
     * Gets query for [[TblStRegistrations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStRegistrations()
    {
        return $this->hasMany(TblStRegistration::className(), ['program_id' => 'id']);
    }

    /**
     * Gets query for [[TblStuds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStuds()
    {
        return $this->hasMany(TblStud::className(), ['program_id' => 'id']);
    }

    /**
     * Gets query for [[TblStudResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudResults()
    {
        return $this->hasMany(TblStudResult::className(), ['program_id' => 'id']);
    }
}
