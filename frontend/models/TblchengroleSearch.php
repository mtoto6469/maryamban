<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tblchengrole;

/**
 * TblchengroleSearch represents the model behind the search form about `frontend\models\Tblchengrole`.
 */
class TblchengroleSearch extends Tblchengrole
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pro', 'confirm', 'enabel_view'], 'integer'],
            [['description', 'date', 'date_ir'], 'safe'],
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
        $query = Tblchengrole::find();

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
            'id_pro' => $this->id_pro,
            'confirm' => $this->confirm,
            'enabel_view' => $this->enabel_view,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'date_ir', $this->date_ir]);

        return $dataProvider;
    }
}
