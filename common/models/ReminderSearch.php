<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Reminder;

/**
 * ReminderSearch represents the model behind the search form of `common\models\Reminder`.
 */
class ReminderSearch extends Reminder
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'vehicle_id'], 'integer'],
            [['date', 'message'], 'safe'],
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
        $query = Reminder::find();

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
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}
