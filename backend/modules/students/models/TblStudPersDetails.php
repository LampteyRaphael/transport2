<?php

namespace backend\modules\students\models;

use Yii;

/**
 * This is the model class for table "tbl_stud_pers_details".
 *
 * @property int $id
 * @property string $surname
 * @property int $title
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $gender
 * @property string $date_of_birth
 * @property string $nationality
 * @property string $date_apply
 * @property int $application_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TblStud[] $tblStuds
 */
class TblStudPersDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_stud_pers_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surname', 'title', 'first_name', 'gender', 'date_of_birth', 'nationality', 'application_id'], 'required'],
            [['title', 'application_id'], 'integer'],
            [['date_of_birth', 'date_apply', 'created_at', 'updated_at'], 'safe'],
            [['surname', 'first_name', 'middle_name', 'nationality'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Surname',
            'title' => 'Title',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'gender' => 'Gender',
            'date_of_birth' => 'Date Of Birth',
            'nationality' => 'Nationality',
            'date_apply' => 'Date Apply',
            'application_id' => 'Application ID',
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
        return $this->hasMany(TblStud::className(), ['personal_details_id' => 'id']);
    }
}
