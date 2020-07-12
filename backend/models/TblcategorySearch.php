<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblcategory;

/**
 * TblcategorySearch represents the model behind the search form about `backend\models\Tblcategory`.
 */
class TblcategorySearch extends Tblcategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_category', 'enable_category', 'enabel_view_category', 'id_parent', 'group_category'], 'integer'],
            [['title_category', 'description_category'], 'safe'],
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
        $query = Tblcategory::find();

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
            'id_category' => $this->id_category,
            'enable_category' => $this->enable_category,
            'enabel_view_category' => $this->enabel_view_category,
            'id_parent' => $this->id_parent,
            'group_category' => $this->group_category,
        ]);

        $query->andFilterWhere(['like', 'title_category', $this->title_category])
            ->andFilterWhere(['like', 'description_category', $this->description_category]);

        return $dataProvider;
    }
}
