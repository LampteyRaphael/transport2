<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblOsn;

/**
 * TblOsnSearch represents the model behind the search form of `common\models\TblOsn`.
 */
class TblOsnSearch extends TblOsn
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'osn_number', 'status'], 'integer'],
            [['year', 'transaction_no'], 'safe'],
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
        $query = TblOsn::find();

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
            'osn_number' => $this->osn_number,
            'status' => $this->status,
            'year' => $this->year,
        ]);

        $query->andFilterWhere(['like', 'transaction_no', $this->transaction_no]);

        return $dataProvider;
    }
}
