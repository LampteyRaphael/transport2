<?php

namespace common\models;
use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


class Users extends ActiveRecord implements  IdentityInterface
{
    const SCENARIO_LOGIN = 'login';
    const SCENARIO_CREATE = 'create';

    public static function tableName() {
        return 'user';
    }

    // private $role_id;
    // private $block_id;
    // private $room_id;


    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_LOGIN] = ['username', 'password'];
        $scenarios[self::SCENARIO_CREATE] = ['username', 'password', 'authKey'];
        return $scenarios;
    }

    public function rules() {
        return [
            [['username', 'email'], 'string', 'max' => 45],
            [['email'], 'email'],
            [['role_id'], 'integer'],
            [['password'], 'string', 'max' => 60],
            [['authKey'], 'string', 'max' => 32],

            [['username', 'password', 'email','role_id'], 'required'],
            [['authKey'], 'default', 'on' => self::SCENARIO_CREATE, 'value' => Yii::$app->getSecurity()->generateRandomString()],
            [['password'], 'filter', 'on' => self::SCENARIO_CREATE, 'filter' => function($value) {
                return Yii::$app->getSecurity()->generatePasswordHash($value);
            }],

            [['username', 'password','role_id','block_id','room_id'], 'required', 'on' => self::SCENARIO_LOGIN],

            [['username'], 'unique'],
            [['email'], 'unique'],
            [['authKey'], 'unique'],

        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'id',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'role_id'=>'Role Name',
            'authKey' => 'authKey',
            'block_id'=>'Block',
            'room_id'=>'Room'
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


//relational to rooms table as one to many relation
public function getRole(){

    return $this->hasOne(Role::className(),['id'=>'role_id']);
}

public function getStatus(){

    return $this->hasOne(ActiveStatus::className(),['id'=>'is_active']);
}

}