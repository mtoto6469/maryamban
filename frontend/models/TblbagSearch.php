<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tblbag;

/**
 * TblbagSearch represents the model behind the search form about `frontend\models\Tblbag`.
 */
class TblbagSearch extends Tblbag
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_pro', 'count', 'id_fac', 'enabel', 'enable_view', 'down_buy', 'pak'], 'integer'],
            [['date', 'date_ir', 'size', 'color'], 'safe'],
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
        $query = Tblbag::find();

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
            'id_user' => $this->id_user,
            'id_pro' => $this->id_pro,
            'count' => $this->count,
            'date' => $this->date,
            'id_fac' => $this->id_fac,
            'enabel' => $this->enabel,
            'enable_view' => $this->enable_view,
            'down_buy' => $this->down_buy,
            'pak' => $this->pak,
        ]);

        $query->andFilterWhere(['like', 'date_ir', $this->date_ir])
            ->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'color', $this->color]);

        return $dataProvider;
    }
}
