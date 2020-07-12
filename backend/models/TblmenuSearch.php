<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblmenu;

/**
 * TblmenuSearch represents the model behind the search form about `backend\models\Tblmenu`.
 */
class TblmenuSearch extends Tblmenu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_menu', 'id_category', 'position', 'enable'], 'integer'],
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
        $query = Tblmenu::find();

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
            'id_menu' => $this->id_menu,
            'id_category' => $this->id_category,
            'position' => $this->position,
            'enable' => $this->enable,
        ]);

        return $dataProvider;
    }
}
