<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "annual_entitlement_catories".
 *
 * @property int $id
 * @property string $categories
 * @property int $numberOfEntitlement
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class AnnualEntitlementCatories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'annual_entitlement_catories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categories', 'numberOfEntitlement'], 'required'],
            [['numberOfEntitlement'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['categories'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categories' => 'Categories',
            'numberOfEntitlement' => 'Number Of Entitlement',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
