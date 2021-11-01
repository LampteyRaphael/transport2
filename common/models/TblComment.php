<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_comment".
 *
 * @property int $id
 * @property int $staff_id
 * @property string $description
 * @property string $reply
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property TblStaffList $staff
 */
class TblComment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['staff_id', 'description', 'reply'], 'required'],
            [['staff_id'], 'integer'],
            [['description', 'reply'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStaffList::className(), 'targetAttribute' => ['staff_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'staff_id' => 'Staff ID',
            'description' => 'Description',
            'reply' => 'Reply',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Staff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(TblStaffList::className(), ['id' => 'staff_id']);
    }
}
