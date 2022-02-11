<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Operations;

/**
 * OperationsSearch represents the model behind the search form of `common\models\Operations`.
 */
class OperationsSearch extends Operations
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'vehicle_id', 'driver_id', 'trip_type', 'trip_id', 'officerAssigned'], 'integer'],
            [['trip_start_location','amount', 'trip_end_location', 'start_date', 'end_date', 'departureMileage', 'assignmentCompletionTime', 'arrivalMileage', 'created_at', 'updated_at'], 'safe'],
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
        $query = Operations::find();

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
            'vehicle_id' => $this->vehicle_id,
            'driver_id' => $this->driver_id,
            'trip_type' => $this->trip_type,
            'trip_id' => $this->trip_id,
            'start_date' => $this->start_date,
            'amount' => $this->amount,
            'end_date' => $this->end_date,
            'officerAssigned' => $this->officerAssigned,
            'assignmentCompletionTime' => $this->assignmentCompletionTime,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'trip_start_location', $this->trip_start_location])
            ->andFilterWhere(['like', 'trip_end_location', $this->trip_end_location])
            ->andFilterWhere(['like', 'departureMileage', $this->departureMileage])
            ->andFilterWhere(['like', 'amount', $this->amount])
            ->andFilterWhere(['like', 'arrivalMileage', $this->arrivalMileage]);

        return $dataProvider;
    }
}
