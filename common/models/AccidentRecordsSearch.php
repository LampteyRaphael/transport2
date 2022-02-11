<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AccidentRecords;

/**
 * AccidentRecordsSearch represents the model behind the search form of `app\models\AccidentRecords`.
 */
class AccidentRecordsSearch extends AccidentRecords
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'driver_id', 'nameOfOfficer', 'vehicle_id'], 'integer'],
            [['dateOfIncident', 'description', 'actionTaken', 'policeReport', 'remedy', 'created_at', 'updated_at'], 'safe'],
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
        $query = AccidentRecords::find();

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
            'dateOfIncident' => $this->dateOfIncident,
            'driver_id' => $this->driver_id,
            'nameOfOfficer' => $this->nameOfOfficer,
            'vehicle_id' => $this->vehicle_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'actionTaken', $this->actionTaken])
            ->andFilterWhere(['like', 'policeReport', $this->policeReport])
            ->andFilterWhere(['like', 'remedy', $this->remedy]);

        return $dataProvider;
    }
}
