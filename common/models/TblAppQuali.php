<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_app_quali".
 *
 * @property int $id
 * @property int $application_id
 * @property int $status
 * @property int $user_id
 * @property int $accadamin_year_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TblAcadamicYear $accadaminYear
 * @property TblApp $application
 * @property User $user
 * @property TblAppQualiStatus $status0
 */
class TblAppQuali extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_app_quali';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['application_id', 'status', 'user_id', 'accadamin_year_id'], 'required'],
            [['application_id', 'status', 'user_id', 'accadamin_year_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['accadamin_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblAcadamicYear::className(), 'targetAttribute' => ['accadamin_year_id' => 'id']],
            [['application_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblApp::className(), 'targetAttribute' => ['application_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppQualiStatus::className(), 'targetAttribute' => ['status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'application_id' => 'Application ID',
            'status' => 'Status',
            'user_id' => 'User ID',
            'accadamin_year_id' => 'Accadamin Year ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[AccadaminYear]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccadaminYear()
    {
        return $this->hasOne(TblAcadamicYear::className(), ['id' => 'accadamin_year_id']);
    }

    /**
     * Gets query for [[Application]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplication()
    {
        return $this->hasOne(TblApp::className(), ['id' => 'application_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(TblAppQualiStatus::className(), ['id' => 'status']);
    }
}
