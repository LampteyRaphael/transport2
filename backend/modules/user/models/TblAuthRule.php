<?php

namespace backend\modules\user\models;

use Yii;

/**
 * This is the model class for table "tbl_auth_rule".
 *
 * @property string $name
 * @property resource|null $data
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property TblAuthItem[] $tblAuthItems
 */
class TblAuthRule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_auth_rule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['data'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 64],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'data' => 'Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[TblAuthItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblAuthItems()
    {
        return $this->hasMany(TblAuthItem::className(), ['rule_name' => 'name']);
    }
}
