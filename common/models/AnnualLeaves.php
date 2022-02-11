<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "annual_leaves".
 *
 * @property int $id
 * @property string $name
 * @property string $jobTitle
 * @property string $department_id
 * @property string $applyForDays
 * @property string $year
 * @property string $effectiveDate
 * @property string|null $userSignature_id
 * @property string|null $recommendBy_id
 * @property string $approveBy
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class AnnualLeaves extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'annual_leaves';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'jobTitle', 'department_id', 'applyForDays', 'year', 'effectiveDate', 'approveBy'], 'required'],
            [['year', 'created_at', 'updated_at'], 'safe'],
            [['name', 'jobTitle', 'department_id', 'applyForDays', 'effectiveDate', 'userSignature_id', 'recommendBy_id', 'approveBy'], 'string', 'max' => 255],
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
            'jobTitle' => 'Job Title',
            'department_id' => 'Department ID',
            'applyForDays' => 'Apply For Days',
            'year' => 'Year',
            'effectiveDate' => 'Effective Date',
            'userSignature_id' => 'User Signature ID',
            'recommendBy_id' => 'Recommend By ID',
            'approveBy' => 'Approve By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
