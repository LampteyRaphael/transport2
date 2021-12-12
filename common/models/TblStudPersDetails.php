<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_stud_pers_details".
 *
 * @property int $id
 * @property string $last_name
 * @property int $title
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $gender
 * @property string|null $date_of_birth
 * @property string $nationality
 * @property string $contact_person
 * @property string $contact_number
 * @property string|null $photo
 * @property string|null $date_apply
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TblAppStudProgram[] $tblAppStudPrograms
 * @property TblStudDoc[] $tblStudDocs
 * @property TblStudEduBg[] $tblStudEduBgs
 * @property TblStudEmployDetails[] $tblStudEmployDetails
 * @property TblStud[] $tblStuds
 * @property TblStud[] $tblStuds0
 * @property TblStud[] $tblStuds1
 * @property TblStud[] $tblStuds2
 * @property TblStud[] $tblStuds3
 * @property TblTitleTb $title0
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
            [['last_name', 'title', 'first_name', 'gender', 'nationality', 'contact_person', 'contact_number'], 'required'],
            [['title'], 'integer'],
            [['date_of_birth', 'date_apply', 'created_at', 'updated_at'], 'safe'],
            [['last_name', 'first_name', 'middle_name', 'nationality', 'photo'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 50],
            [['contact_person'], 'string', 'max' => 100],
            [['contact_number'], 'string', 'max' => 20],
            [['contact_number'],'unique'],
            [['title'], 'exist', 'skipOnError' => true, 'targetClass' => TblTitleTb::className(), 'targetAttribute' => ['title' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'last_name' => 'Last Name',
            'title' => 'Title',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'gender' => 'Gender',
            'date_of_birth' => 'Date Of Birth',
            'nationality' => 'Nationality',
            'contact_person' => 'Contact Person',
            'contact_number' => 'Contact Number',
            'photo' => 'Photo',
            'date_apply' => 'Date Apply',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[TblAppStudPrograms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppStudPrograms()
    {
        return $this->hasMany(TblAppStudProgram::className(), ['stud_per_id' => 'id']);
    }

    /**
     * Gets query for [[TblStudDocs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudDocs()
    {
        return $this->hasMany(TblStudDoc::className(), ['stud_per_id' => 'id']);
    }

    /**
     * Gets query for [[TblStudEduBgs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudEduBgs()
    {
        return $this->hasMany(TblStudEduBg::className(), ['stud_per_id' => 'id']);
    }

    /**
     * Gets query for [[TblStudEmployDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudEmployDetails()
    {
        return $this->hasMany(TblStudEmployDetails::className(), ['stud_per_id' => 'id']);
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

    /**
     * Gets query for [[TblStuds0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStuds0()
    {
        return $this->hasMany(TblStud::className(), ['personal_education_id' => 'id']);
    }

    /**
     * Gets query for [[TblStuds1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStuds1()
    {
        return $this->hasMany(TblStud::className(), ['personal_employment_id' => 'id']);
    }

    /**
     * Gets query for [[TblStuds2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStuds2()
    {
        return $this->hasMany(TblStud::className(), ['personal_document_id' => 'id']);
    }

    /**
     * Gets query for [[TblStuds3]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStuds3()
    {
        return $this->hasMany(TblStud::className(), ['program_id' => 'id']);
    }

    /**
     * Gets query for [[Title0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTitle0()
    {
        return $this->hasOne(TblTitleTb::className(), ['id' => 'title']);
    }
}
