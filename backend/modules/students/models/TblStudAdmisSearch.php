<?php

namespace backend\modules\students\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\students\models\TblStudAdmis;

/**
 * TblStudAdmisSearch represents the model behind the search form of `backend\modules\students\models\TblStudAdmis`.
 */
class TblStudAdmisSearch extends TblStudAdmis
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'students_id', 'status', 'user_id', 'accadamin_year_id'], 'integer'],
            [['created_at', 'updated_at', 'doa', 'doc'], 'safe'],
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
        $query = TblStudAdmis::find();

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
            'students_id' => $this->students_id,
            'status' => $this->status,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'accadamin_year_id' => $this->accadamin_year_id,
            'doa' => $this->doa,
            'doc' => $this->doc,
        ]);

        return $dataProvider;
    }
}
