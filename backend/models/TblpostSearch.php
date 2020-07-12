<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblpost;

/**
 * TblpostSearch represents the model behind the search form about `backend\models\Tblpost`.
 */
class TblpostSearch extends Tblpost
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_group', 'id_img_mob', 'id_img_web', 'enable', 'enable_view', 'type', 'user_id'], 'integer'],
            [['title', 'text_web', 'id_category_post', 'tag', 'keyword', 'link', 'time', 'time_ir', 'id_position', 'description', 'status'], 'safe'],
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
    public function search($params,$flag)
    {
        $query = Tblpost::find();
        if($flag==1){
            $query=$query->where(['type'=>1]);
        }
        else {
            $query=$query->where(['type'=>2]);
        }

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
            'id_group' => $this->id_group,
            'id_img_mob' => $this->id_img_mob,
            'id_img_web' => $this->id_img_web,
            'enable' => $this->enable,
            'enable_view' => $this->enable_view,
            'type' => $this->type,
            'time' => $this->time,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text_web', $this->text_web])
            ->andFilterWhere(['like', 'id_category_post', $this->id_category_post])
            ->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'time_ir', $this->time_ir])
            ->andFilterWhere(['like', 'id_position', $this->id_position])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
