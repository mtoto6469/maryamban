<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tbldiscount;

/**
 * TbldiscountSearch represents the model behind the search form about `backend\models\Tbldiscount`.
 */
class TbldiscountSearch extends Tbldiscount
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'all_pro', 'price', 'enabel', 'enabel_view'], 'integer'],
            [['name', 'description' ], 'safe'],
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
        $query = Tbldiscount::find()->andWhere(['enabel_view'=>1]);

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
            'all_pro' => $this->all_pro,
            'price' => $this->price,

            'enabel' => $this->enabel,
            'enabel_view' => $this->enabel_view,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);


        return $dataProvider;
    }
}
