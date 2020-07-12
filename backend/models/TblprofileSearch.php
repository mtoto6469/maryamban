<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblprofile;

/**
 * TblprofileSearch represents the model behind the search form about `backend\models\Tblprofile`.
 */
class TblprofileSearch extends Tblprofile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tel', 'enable_view'], 'integer'],
            [['name', 'lastname', 'role', 'address', 'user_id'], 'safe'],
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
        $query = Tblprofile::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
    $query->joinWith('idUser')->andWhere([
                Tblprofile::tableName().'.enable_view' =>1,
               
            ]);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
         
            'tel' => $this->tel,
            'enable_view' => $this->enable_view,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like','user.username',$this->user_id]);

        return $dataProvider;
    }
}
