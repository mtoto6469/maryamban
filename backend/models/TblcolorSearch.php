<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblcolor;

/**
 * TblcolorSearch represents the model behind the search form about `backend\models\Tblcolor`.
 */
class TblcolorSearch extends Tblcolor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pro', 'enabel', 'enabel_view', 'img'], 'integer'],
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
        $query = Tblcolor::find();

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
            'enabel' => $this->enabel,
            'enabel_view' => $this->enabel_view,
            'img' => $this->img,
        ]);

        $query->andFilterWhere(['like', 'color', $this->color]);

        return $dataProvider;
    }
}
