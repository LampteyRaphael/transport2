<?php

namespace backend\modules\departments\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\departments\models\TblCourseDepart;

/**
 * TblCourseDepartSearch represents the model behind the search form of `backend\modules\departments\models\TblCourseDepart`.
 */
class TblCourseDepartSearch extends TblCourseDepart
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'depart_id', 'course_id'], 'integer'],
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
        $query = TblCourseDepart::find();

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
            'depart_id' => $this->depart_id,
            'course_id' => $this->course_id,
        ]);

        return $dataProvider;
    }
}
