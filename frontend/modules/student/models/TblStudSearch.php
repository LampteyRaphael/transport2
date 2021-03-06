<?php

namespace frontend\modules\student\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\student\models\TblStud;

/**
 * TblStudSearch represents the model behind the search form of `frontend\modules\student\models\TblStud`.
 */
class TblStudSearch extends TblStud
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'personal_details_id', 'personal_address_id', 'personal_education_id', 'personal_employment_id', 'personal_document_id', 'application_type', 'status', 'user_id', 'program_id'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
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
        $query = TblStud::find();

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
            'personal_details_id' => $this->personal_details_id,
            'personal_address_id' => $this->personal_address_id,
            'personal_education_id' => $this->personal_education_id,
            'personal_employment_id' => $this->personal_employment_id,
            'personal_document_id' => $this->personal_document_id,
            'application_type' => $this->application_type,
            'status' => $this->status,
            'user_id' => $this->user_id,
            'program_id' => $this->program_id,
            'date' => $this->date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
