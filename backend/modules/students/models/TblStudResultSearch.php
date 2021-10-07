<?php

namespace backend\modules\students\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\students\models\TblStudResult;

/**
 * TblStudResultSearch represents the model behind the search form of `backend\modules\students\models\TblStudResult`.
 */
class TblStudResultSearch extends TblStudResult
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'student_id', 'program_id', 'course_id', 'section_id', 'grade_id', 'auth_id', 'course_lecture_id', 'status'], 'integer'],
            [['date_of_entry', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TblStudResult::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'student_id' => $this->student_id,
            'program_id' => $this->program_id,
            'course_id' => $this->course_id,
            'section_id' => $this->section_id,
            'grade_id' => $this->grade_id,
            'auth_id' => $this->auth_id,
            'course_lecture_id' => $this->course_lecture_id,
            'date_of_entry' => $this->date_of_entry,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
