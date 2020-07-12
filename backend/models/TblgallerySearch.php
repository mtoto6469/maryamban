<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblgallery;

/**
 * TblgallerySearch represents the model behind the search form about `backend\models\Tblgallery`.
 */
class TblgallerySearch extends Tblgallery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'and_web', 'enable', 'enable_view'], 'integer'],
            [['title', 'address', 'alert', 'description'], 'safe'],
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
        $query = Tblgallery::find();

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
            'and_web' => $this->and_web,
            'enable' => $this->enable,
            'enable_view' => $this->enable_view,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'alert', $this->alert])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
