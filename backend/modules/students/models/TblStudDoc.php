<?php

namespace backend\modules\students\models;

use Yii;

/**
 * This is the model class for table "tbl_stud_doc".
 *
 * @property int $id
 * @property int $document_category
 * @property string $document_type
 * @property int $application_id
 *
 * @property TblStud[] $tblStuds
 * @property TblStudDocType $documentCategory
 */
class TblStudDoc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_stud_doc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['document_category', 'document_type', 'application_id'], 'required'],
            [['document_category', 'application_id'], 'integer'],
            [['document_type'], 'string', 'max' => 255],
            [['document_category'], 'exist', 'skipOnError' => true, 'targetClass' => TblStudDocType::className(), 'targetAttribute' => ['document_category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'document_category' => 'Document Category',
            'document_type' => 'Document Type',
            'application_id' => 'Application ID',
        ];
    }

    /**
     * Gets query for [[TblStuds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStuds()
    {
        return $this->hasMany(TblStud::className(), ['personal_document_id' => 'id']);
    }

    /**
     * Gets query for [[DocumentCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentCategory()
    {
        return $this->hasOne(TblStudDocType::className(), ['id' => 'document_category']);
    }
}
