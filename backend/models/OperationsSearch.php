<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Operations;

/**
 * OperationsSearch represents the model behind the search form of `app\models\Operations`.
 */
class OperationsSearch extends Operations
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'driver_id', 'officerAssigned', 'vehicle_id'], 'integer'],
            [['departurePoint', 'departureMileage', 'destination', 'date', 'assignmentCompletionTime', 'arrivalMileage', 'created_at', 'updated_at'], 'safe'],
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
            'driver_id' => $this->driver_id,
            'date' => $this->date,
            'officerAssigned' => $this->officerAssigned,
            'assignmentCompletionTime' => $this->assignmentCompletionTime,
            'vehicle_id' => $this->vehicle_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'departurePoint', $this->departurePoint])
            ->andFilterWhere(['like', 'departureMileage', $this->departureMileage])
            ->andFilterWhere(['like', 'destination', $this->destination])
            ->andFilterWhere(['like', 'arrivalMileage', $this->arrivalMileage]);

        return $dataProvider;
    }
}
