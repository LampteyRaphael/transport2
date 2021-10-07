<?php

namespace backend\modules\staff\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\staff\models\TblStaffList;

/**
 * TblStaffListSearch represents the model behind the search form of `backend\modules\staff\models\TblStaffList`.
 */
class TblStaffListSearch extends TblStaffList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'staff_category_id'], 'integer'],
            [['title', 'first_name', 'surname', 'middle_name', 'city', 'country', 'date_of_birth', 'ranks', 'doa', 'telephone_number', 'created_at', 'updated_at', 'date'], 'safe'],
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
        $query = TblStaffList::find();

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
            'date_of_birth' => $this->date_of_birth,
            'doa' => $this->doa,
            'user_id' => $this->user_id,
            'staff_category_id' => $this->staff_category_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'ranks', $this->ranks])
            ->andFilterWhere(['like', 'telephone_number', $this->telephone_number]);

        return $dataProvider;
    }
}
