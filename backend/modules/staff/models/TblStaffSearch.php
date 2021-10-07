<?php

namespace backend\modules\staff\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\staff\models\TblStaff;

/**
 * TblStaffSearch represents the model behind the search form of `backend\modules\staff\models\TblStaff`.
 */
class TblStaffSearch extends TblStaff
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'staff_id', 'department_id'], 'integer'],
            [['staff_description'], 'safe'],
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
        $query = TblStaff::find();

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
            'staff_id' => $this->staff_id,
            'department_id' => $this->department_id,
        ]);

        $query->andFilterWhere(['like', 'staff_description', $this->staff_description]);

        return $dataProvider;
    }
}
