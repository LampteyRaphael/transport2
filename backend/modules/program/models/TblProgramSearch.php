<?php

namespace backend\modules\program\models;

use common\models\TblProgram;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * TblProgramSearch represents the model behind the search form of `backend\modules\program\models\TblProgram`.
 */
class TblProgramSearch extends TblProgram
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['program_name','program_category_id', 'level_id','program_code', 'created_at', 'updated_at'], 'safe'],
            [['amount'], 'number'],
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
        $query = TblProgram::find();

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
        $query->joinWith(['level','programCategory']);
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'amount' => $this->amount,
            // 'program_category_id' => $this->program_category_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'program_name', $this->program_name])
        ->andFilterWhere(['like', 'tbl_level.level_name', $this->level_id])
        ->andFilterWhere(['like', 'tbl_program_type.name', $this->program_category_id])
            ->andFilterWhere(['like', 'program_code', $this->program_code]);

        return $dataProvider;
    }
}
