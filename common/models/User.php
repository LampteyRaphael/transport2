<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string|null $authKey
 * @property string|null $accessToken
 * @property int $role_id
 * @property int $is_active
 * @property int|null $block_id
 * @property int|null $room_id
 *
 * @property AuthAssignment[] $authAssignments
 * @property AuthItem[] $itemNames
 * @property Inventory[] $inventories
 * @property Request[] $requests
 * @property Role $role
 * @property ActiveStatus $isActive
 */
class User extends \yii\db\ActiveRecord implements  IdentityInterface
{
    const SCENARIO_LOGIN = 'login';
    const SCENARIO_CREATE = 'create';
    /**
     * {@inheritdoc}
     */
    public $name;
    public static function tableName()
    {
        return 'user';
    }


    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_LOGIN] = ['username', 'password'];
        $scenarios[self::SCENARIO_CREATE] = ['username', 'password', 'authKey'];
        return $scenarios;
    }

    public function rules()
    {
        return [
            [['username', 'password', 'email', 'tel', 'date_of_birth', 'status', 'total_experience'], 'required'],
            [['date_of_birth', 'license_expire_date', 'date_of_join'], 'safe'],
            [['license_no', 'status', 'total_experience'], 'integer'],
            [['username', 'password', 'email', 'photo', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['tel'], 'string', 'max' => 20],
            [['driver_status'], 'exist', 'skipOnError' => true, 'targetClass' => ActiveStatus::className(), 'targetAttribute' => ['driver_status' => 'id']],
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
            'password' => 'Password',
            'email' => 'Email',
            'tel' => 'Tel',
            'date_of_birth' => 'Date Of Birth',
            'license_no' => 'License No',
            'license_expire_date' => 'License Expire Date',
            'date_of_join' => 'Date Of Join',
            'status' => 'Status',
            'photo' => 'Photo',
            'total_experience' => 'Total Experience',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    public static function findIdentity($id) {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username) {
        return static::findOne(['username' => $username]);
    }

    public function getId() {
        return $this->getPrimaryKey();
    }

    public function getAuthKey() {
        return $this->authKey;
    }

    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password) {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function setPassword($password){
        return Yii::$app->security->generatePasswordHash($password);
    }

       public function generateAuthKey() {
       return Yii::$app->security->generateRandomString();
   }
   
    /**
     * Gets query for [[AuthAssignments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(AuthAssignment::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery
     */


    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    /**
     * Gets query for [[IsActive]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActiveStatus()
    {
        return $this->hasOne(ActiveStatus::className(), ['id' => 'status']);
    }



}
