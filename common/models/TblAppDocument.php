<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_app_document".
 *
 * @property int $id
 * @property int|null $personalDetail_id
 * @property int $osn_id
 * @property string $doc_name
 *
 * @property TblApp[] $tblApps
 * @property TblAppPersDetails $personalDetail
 * @property TblOsn $osn
 */
class TblAppDocument extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_app_document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['personalDetail_id', 'osn_id'], 'integer'],
            [['osn_id', 'doc_name'], 'required'],
            [['doc_name'], 'string', 'max' => 255],
            [['personalDetail_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblAppPersDetails::className(), 'targetAttribute' => ['personalDetail_id' => 'id']],
            [['osn_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblOsn::className(), 'targetAttribute' => ['osn_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'personalDetail_id' => 'Personal Detail ID',
            'osn_id' => 'Osn ID',
            'doc_name' => 'Doc Name',
        ];
    }

    /**
     * Gets query for [[TblApps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblApps()
    {
        return $this->hasMany(TblApp::className(), ['personal_document_id' => 'personalDetail_id']);
    }

    /**
     * Gets query for [[PersonalDetail]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalDetail()
    {
        return $this->hasOne(TblAppPersDetails::className(), ['id' => 'personalDetail_id']);
    }

    /**
     * Gets query for [[Osn]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOsn()
    {
        return $this->hasOne(TblOsn::className(), ['id' => 'osn_id']);
    }
}
