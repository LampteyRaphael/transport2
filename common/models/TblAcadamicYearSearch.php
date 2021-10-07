<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblAcadamicYear;

/**
 * TblAcadamicYearSearch represents the model behind the search form of `common\models\TblAcadamicYear`.
 */
class TblAcadamicYearSearch extends TblAcadamicYear
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['date_of_admission', 'doa', 'doc'], 'safe'],
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
        $query = TblAcadamicYear::find();

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
            'doa' => $this->doa,
            'doc' => $this->doc,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'date_of_admission', $this->date_of_admission]);

        return $dataProvider;
    }
}
