<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TbltypeProduct;

/**
 * TbltypeProductProductSearch represents the model behind the search form about `backend\models\TbltypeProduct`.
 */
class TbltypeProductProductSearch extends TbltypeProduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_parent', 'enabel', 'enabel_view'], 'integer'],
            [['type', 'description'], 'safe'],
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
        $query = TbltypeProduct::find()->where(['enabel_view'=>1]);

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
            'id_parent' => $this->id_parent,
            'enabel' => $this->enabel,
            'enabel_view' => $this->enabel_view,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
