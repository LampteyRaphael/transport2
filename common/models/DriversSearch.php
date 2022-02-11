<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Drivers;

/**
 * DriversSearch represents the model behind the search form of `common\models\Drivers`.
 */
class DriversSearch extends Drivers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'age', 'license_no', 'driver_status', 'vehicle_id', 'total_experience'], 'integer'],
            [['name', 'tel', 'email', 'license_expire_date', 'date_of_join', 'photo', 'created_at', 'updated_at'], 'safe'],
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
        $query = Drivers::find();

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
            'age' => $this->age,
            'license_no' => $this->license_no,
            'license_expire_date' => $this->license_expire_date,
            'date_of_join' => $this->date_of_join,
            'driver_status' => $this->driver_status,
            'vehicle_id' => $this->vehicle_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'total_experience' => $this->total_experience,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'photo', $this->photo]);

        return $dataProvider;
    }
}
