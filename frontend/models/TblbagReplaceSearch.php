<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblbagReplace;

/**
 * TblbagReplaceSearch represents the model behind the search form about `frontend\models\TblbagReplace`.
 */
class TblbagReplaceSearch extends TblbagReplace
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_pro', 'count', 'id_fac', 'enabel', 'enabel_view', 'down_buy', 'size', 'id_all_post', 'price', 'id_replace', 'id_bag'], 'integer'],
            [['color'], 'safe'],
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
        $query = TblbagReplace::find();

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
            'id_fac' => $this->id_fac,
            'enabel' => $this->enabel,
            'enabel_view' => $this->enabel_view,
            'down_buy' => $this->down_buy,
            'size' => $this->size,
            'id_all_post' => $this->id_all_post,
            'price' => $this->price,
            'id_replace' => $this->id_replace,
            'id_bag' => $this->id_bag,
        ]);

        $query->andFilterWhere(['like', 'color', $this->color]);

        return $dataProvider;
    }
}
