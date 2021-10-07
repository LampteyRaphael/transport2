<?php

namespace backend\modules\students\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\students\models\TblStudGrade;

/**
 * TblStudGradeSearch represents the model behind the search form of `backend\modules\students\models\TblStudGrade`.
 */
class TblStudGradeSearch extends TblStudGrade
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'grade_point'], 'integer'],
            [['grade_name'], 'safe'],
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
        $query = TblStudGrade::find();

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
            'grade_point' => $this->grade_point,
        ]);

        $query->andFilterWhere(['like', 'grade_name', $this->grade_name]);

        return $dataProvider;
    }
}
