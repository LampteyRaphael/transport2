<?php

namespace backend\modules\user\models;

use Yii;

/**
 * This is the model class for table "tbl_auth_item".
 *
 * @property string $name
 * @property int|null $type
 * @property string|null $description
 * @property string|null $rule_name
 * @property resource|null $data
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property TblAuthAssignment[] $tblAuthAssignments
 * @property TblUser[] $users
 * @property TblAuthRule $ruleName
 * @property TblAuthItemChild[] $tblAuthItemChildren
 * @property TblAuthAssignment[] $parents
 */
class TblAuthItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_auth_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['name'], 'unique'],
            [['rule_name'], 'exist', 'skipOnError' => true, 'targetClass' => TblAuthRule::className(), 'targetAttribute' => ['rule_name' => 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'type' => 'Type',
            'description' => 'Description',
            'rule_name' => 'Rule Name',
            'data' => 'Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[TblAuthAssignments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAuthAssignments()
    {
        return $this->hasMany(TblAuthAssignment::className(), ['item_name' => 'name']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(TblUser::className(), ['id' => 'user_id'])->viaTable('tbl_auth_assignment', ['item_name' => 'name']);
    }

    /**
     * Gets query for [[RuleName]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRuleName()
    {
        return $this->hasOne(TblAuthRule::className(), ['name' => 'rule_name']);
    }

    /**
     * Gets query for [[TblAuthItemChildren]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAuthItemChildren()
    {
        return $this->hasMany(TblAuthItemChild::className(), ['child' => 'name']);
    }

    /**
     * Gets query for [[Parents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParents()
    {
        return $this->hasMany(TblAuthAssignment::className(), ['item_name' => 'parent'])->viaTable('tbl_auth_item_child', ['child' => 'name']);
    }
}
