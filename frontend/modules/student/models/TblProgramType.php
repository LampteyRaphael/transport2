<?php

namespace frontend\modules\student\models;

use Yii;

/**
 * This is the model class for table "tbl_program_type".
 *
 * @property int $id
 * @property string $name
 *
 * @property TblProgram[] $tblPrograms
 */
class TblProgramType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_program_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[TblPrograms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblPrograms()
    {
        return $this->hasMany(TblProgram::className(), ['program_category_id' => 'id']);
    }
}
