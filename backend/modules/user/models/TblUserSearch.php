<?php

namespace backend\modules\user\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\user\models\TblUser;

/**
 * TblUserSearch represents the model behind the search form of `backend\modules\user\models\TblUser`.
 */
class TblUserSearch extends TblUser
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['username','status','role_id', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'created_at', 'updated_at', 'verification_token'], 'safe'],
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
        $query = TblUser::find();

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
            // 'status' => $this->status,
            // 'role_id' => $this->role_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->joinWith(['status0','role']);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'tbl_status_category.name', $this->status])
            ->andFilterWhere(['like', 'tbl_role.name', $this->role_id])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'verification_token', $this->verification_token]);

        return $dataProvider;
    }
}
