<?php

namespace backend\modules\students\models;

use Yii;

/**
 * This is the model class for table "tbl_user".
 *
 * @property int $id
 * @property string $username
 * @property string|null $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int|null $status
 * @property int|null $role_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $verification_token
 *
 * @property TblAdmissLog[] $tblAdmissLogs
 * @property TblAppAdmission[] $tblAppAdmissions
 * @property TblAppQuali[] $tblAppQualis
 * @property TblAppStatusLog[] $tblAppStatusLogs
 * @property TblAuthAssignment[] $tblAuthAssignments
 * @property TblAuthItem[] $itemNames
 * @property TblQualiLog[] $tblQualiLogs
 * @property TblStaffList[] $tblStaffLists
 * @property TblStud[] $tblStuds
 * @property TblStudAdmis[] $tblStudAdmis
 * @property TblStudQuali[] $tblStudQualis
 * @property TblStudRegisLog[] $tblStudRegisLogs
 * @property TblStudResult[] $tblStudResults
 * @property TblRole $role
 * @property TblStatusCategory $status0
 * @property TblUserLog[] $tblUserLogs
 * @property TblUserLog[] $tblUserLogs0
 */
class TblUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'email'], 'required'],
            [['status', 'role_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblRole::className(), 'targetAttribute' => ['role_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => TblStatusCategory::className(), 'targetAttribute' => ['status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'role_id' => 'Role ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
        ];
    }

    /**
     * Gets query for [[TblAdmissLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAdmissLogs()
    {
        return $this->hasMany(TblAdmissLog::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TblAppAdmissions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppAdmissions()
    {
        return $this->hasMany(TblAppAdmission::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TblAppQualis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppQualis()
    {
        return $this->hasMany(TblAppQuali::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TblAppStatusLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAppStatusLogs()
    {
        return $this->hasMany(TblAppStatusLog::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TblAuthAssignments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAuthAssignments()
    {
        return $this->hasMany(TblAuthAssignment::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[ItemNames]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemNames()
    {
        return $this->hasMany(TblAuthItem::className(), ['name' => 'item_name'])->viaTable('tbl_auth_assignment', ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TblQualiLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblQualiLogs()
    {
        return $this->hasMany(TblQualiLog::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TblStaffLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStaffLists()
    {
        return $this->hasMany(TblStaffList::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TblStuds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStuds()
    {
        return $this->hasMany(TblStud::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TblStudAdmis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudAdmis()
    {
        return $this->hasMany(TblStudAdmis::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TblStudQualis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudQualis()
    {
        return $this->hasMany(TblStudQuali::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TblStudRegisLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudRegisLogs()
    {
        return $this->hasMany(TblStudRegisLog::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TblStudResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudResults()
    {
        return $this->hasMany(TblStudResult::className(), ['auth_id' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(TblRole::className(), ['id' => 'role_id']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(TblStatusCategory::className(), ['id' => 'status']);
    }

    /**
     * Gets query for [[TblUserLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblUserLogs()
    {
        return $this->hasMany(TblUserLog::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TblUserLogs0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblUserLogs0()
    {
        return $this->hasMany(TblUserLog::className(), ['status' => 'status']);
    }
}
