<?php

namespace backend\modules\students\models;

use Yii;

/**
 * This is the model class for table "tbl_stud_acad_year".
 *
 * @property int $id
 * @property string $date_of_admission
 *
 * @property TblStudAdmis[] $tblStudAdmis
 * @property TblStudQuali[] $tblStudQualis
 */
class TblStudAcadYear extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_stud_acad_year';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_of_admission'], 'required'],
            [['date_of_admission'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_of_admission' => 'Date Of Admission',
        ];
    }

    /**
     * Gets query for [[TblStudAdmis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudAdmis()
    {
        return $this->hasMany(TblStudAdmis::className(), ['accadamin_year_id' => 'id']);
    }

    /**
     * Gets query for [[TblStudQualis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblStudQualis()
    {
        return $this->hasMany(TblStudQuali::className(), ['accadamin_year_id' => 'id']);
    }
}
