<?php

namespace backend\modules\students\models;

use Yii;

/**
 * This is the model class for table "tbl_stud_employ_details".
 *
 * @property int $id
 * @property string|null $company_name
 * @property string|null $position
 * @property string|null $employer_address
 * @property int|null $employer_telephone_number
 *
 * @property TblStud[] $tblStuds
 */
class TblStudEmployDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_stud_employ_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employer_telephone_number'], 'integer'],
            [['company_name', 'employer_address'], 'string', 'max' => 255],
            [['position'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Company Name',
            'position' => 'Position',
            'employer_address' => 'Employer Address',
            'employer_telephone_number' => 'Employer Telephone Number',
        ];
    }

    /**
     * Gets query for [[TblStuds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStuds()
    {
        return $this->hasMany(TblStud::className(), ['personal_employment_id' => 'id']);
    }
}
