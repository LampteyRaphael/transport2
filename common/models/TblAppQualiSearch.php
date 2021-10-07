<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblAppQuali;

/**
 * TblAppQualiSearch represents the model behind the search form of `backend\modules\qualification\models\TblAppQuali`.
 */
class TblAppQualiSearch extends TblAppQuali
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['application_id','status','user_id','accadamin_year_id','created_at', 'updated_at'], 'safe'],
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
        $query = TblAppQuali::find();

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
            // 'application_id' => $this->application_id,
            // 'status' => $this->status,
            // 'user_id' => $this->user_id,
            // 'accadamin_year_id' => $this->accadamin_year_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);


        $query->joinWith(['application','status0','accadaminYear','user']);

         $query->andFilterWhere(['like', 'tbl_app_quali_status.name', $this->status]);
         $query->andFilterWhere(['like', 'tbl_acadamic_year.date_of_admission', $this->accadamin_year_id]);
         $query->andFilterWhere(['like', 'tbl_user.username', $this->user_id]);
         $query->andFilterWhere(['like', 'tbl_app.personal_details_id', $this->application_id]);

        return $dataProvider;
    }
}
