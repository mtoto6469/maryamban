<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tblprofile;

/**
 * TblprofileSearch represents the model behind the search form about `frontend\models\Tblprofile`.
 */
class TblprofileSearch extends Tblprofile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'code', 'women_men', 'id_user_reagent', 'enable_view'], 'integer'],
            [['name', 'lastname', 'role', 'address'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Tblprofile::find();

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
            'user_id' => $this->user_id,
            'code' => $this->code,
            'women_men' => $this->women_men,
            'id_user_reagent' => $this->id_user_reagent,
            'enable_view' => $this->enable_view,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
