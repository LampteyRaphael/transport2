<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vehicles;

/**
 * VehiclesSearch represents the model behind the search form of `common\models\Vehicles`.
 */
class VehiclesSearch extends Vehicles
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'no_passengers', 'vehicle_id', 'status'], 'integer'],
            [['make', 'regNo', 'chasisNo', 'yearMade', 'purchaseDate', 'colour', 'countryOfOrigin', 'cubicCentimeter', 'fuel', 'engine_no', 'file', 'created_at', 'updated_at'], 'safe'],
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
        $query = Vehicles::find();

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
            'yearMade' => $this->yearMade,
            'purchaseDate' => $this->purchaseDate,
            'no_passengers' => $this->no_passengers,
            'vehicle_id' => $this->vehicle_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'make', $this->make])
            ->andFilterWhere(['like', 'regNo', $this->regNo])
            ->andFilterWhere(['like', 'chasisNo', $this->chasisNo])
            ->andFilterWhere(['like', 'colour', $this->colour])
            ->andFilterWhere(['like', 'countryOfOrigin', $this->countryOfOrigin])
            ->andFilterWhere(['like', 'cubicCentimeter', $this->cubicCentimeter])
            ->andFilterWhere(['like', 'fuel', $this->fuel])
            ->andFilterWhere(['like', 'engine_no', $this->engine_no])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
