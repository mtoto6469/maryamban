<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblproduct;

/**
 * TblproductSearch represents the model behind the search form about `backend\models\Tblproduct`.
 */
class TblproductSearch extends Tblproduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_category', 'id_type', 'id_brand', 'price', 'enabel', 'enabel_view', 'price_namayande', 'time'], 'integer'],
            [['img', 'description','name'], 'safe'],
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
        $query = Tblproduct::find()->where(['enabel_view'=>1]);

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
            'id_category' => $this->id_category,
            'id_type' => $this->id_type,
            'id_brand' => $this->id_brand,
            'price' => $this->price,
            'enabel' => $this->enabel,
            'enabel_view' => $this->enabel_view,
            'price_namayande' => $this->price_namayande,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'img', $this->img])
        ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
