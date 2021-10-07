<?php

namespace backend\modules\departments\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\departments\models\TblDepart;

/**
 * TblDepartSearch represents the model behind the search form of `backend\modules\departments\models\TblDepart`.
 */
class TblDepartSearch extends TblDepart
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['department_name', 'department_code', 'department_phone_number', 'department_office'], 'safe'],
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
        $query = TblDepart::find();

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
        ]);

        $query->andFilterWhere(['like', 'department_name', $this->department_name])
            ->andFilterWhere(['like', 'department_code', $this->department_code])
            ->andFilterWhere(['like', 'department_phone_number', $this->department_phone_number])
            ->andFilterWhere(['like', 'department_office', $this->department_office]);

        return $dataProvider;
    }
}
