<?php

namespace backend\modules\user\models;

use Yii;

/**
 * This is the model class for table "tbl_auth_assignment".
 *
 * @property string $item_name
 * @property int $user_id
 * @property int|null $created_at
 *
 * @property TblUser $user
 * @property TblAuthItem $itemName
 * @property TblAuthItemChild[] $tblAuthItemChildren
 * @property TblAuthItem[] $children
 */
class TblAuthAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_auth_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['user_id', 'created_at'], 'integer'],
            [['item_name'], 'string', 'max' => 64],
            [['item_name', 'user_id'], 'unique', 'targetAttribute' => ['item_name', 'user_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblUser::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['item_name'], 'exist', 'skipOnError' => true, 'targetClass' => TblAuthItem::className(), 'targetAttribute' => ['item_name' => 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_name' => 'Item Name',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
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

    /**
     * Gets query for [[ItemName]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemName()
    {
        return $this->hasOne(TblAuthItem::className(), ['name' => 'item_name']);
    }

    /**
     * Gets query for [[TblAuthItemChildren]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAuthItemChildren()
    {
        return $this->hasMany(TblAuthItemChild::className(), ['parent' => 'item_name']);
    }

    /**
     * Gets query for [[Children]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(TblAuthItem::className(), ['name' => 'child'])->viaTable('tbl_auth_item_child', ['parent' => 'item_name']);
    }
}
