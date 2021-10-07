<?php

namespace backend\modules\staff\models;

use Yii;

/**
 * This is the model class for table "tbl_staff_list".
 *
 * @property int $id
 * @property string $title
 * @property string $first_name
 * @property string $surname
 * @property string|null $middle_name
 * @property string|null $city
 * @property string|null $country
 * @property string $date_of_birth
 * @property string $ranks
 * @property string|null $doa
 * @property string|null $telephone_number
 * @property int $user_id
 * @property int $staff_category_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $date
 *
 * @property TblComment[] $tblComments
 * @property TblLecturer[] $tblLecturers
 * @property TblLogBook[] $tblLogBooks
 * @property TblStaff[] $tblStaff
 * @property TblStaffCategory $staffCategory
 * @property TblUser $user
 */
class TblStaffList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_staff_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'first_name', 'surname', 'date_of_birth', 'ranks', 'user_id', 'staff_category_id'], 'required'],
            [['date_of_birth', 'doa', 'created_at', 'updated_at', 'date'], 'safe'],
            [['user_id', 'staff_category_id'], 'integer'],
            [['title', 'ranks'], 'string', 'max' => 50],
            [['first_name', 'surname', 'middle_name', 'city', 'country'], 'string', 'max' => 255],
            [['telephone_number'], 'string', 'max' => 20],
            [['staff_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStaffCategory::className(), 'targetAttribute' => ['staff_category_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblUser::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'first_name' => 'First Name',
            'surname' => 'Surname',
            'middle_name' => 'Middle Name',
            'city' => 'City',
            'country' => 'Country',
            'date_of_birth' => 'Date Of Birth',
            'ranks' => 'Ranks',
            'doa' => 'Doa',
            'telephone_number' => 'Telephone Number',
            'user_id' => 'User ID',
            'staff_category_id' => 'Staff Category ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[TblComments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblComments()
    {
        return $this->hasMany(TblComment::className(), ['staff_id' => 'id']);
    }

    /**
     * Gets query for [[TblLecturers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblLecturers()
    {
        return $this->hasMany(TblLecturer::className(), ['staff_id' => 'id']);
    }

    /**
     * Gets query for [[TblLogBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblLogBooks()
    {
        return $this->hasMany(TblLogBook::className(), ['staff_id' => 'id']);
    }

    /**
     * Gets query for [[TblStaff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStaff()
    {
        return $this->hasMany(TblStaff::className(), ['staff_id' => 'id']);
    }

    /**
     * Gets query for [[StaffCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaffCategory()
    {
        return $this->hasOne(TblStaffCategory::className(), ['id' => 'staff_category_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(TblUser::className(), ['id' => 'user_id']);
    }
}
