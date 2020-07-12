<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblpardakht;

/**
 * TblpardakhtSearch represents the model behind the search form about `backend\models\Tblpardakht`.
 */
class TblpardakhtSearch extends Tblpardakht
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_fac', 'end_number', 'price', 'peygiri'], 'integer'],
            [['date'], 'safe'],
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
        $query = Tblpardakht::find();

        if($flag==0){
            $query=$query->where(['approve'=>0])->andwhere(['enabel_view'=>1])->andFilterWhere(['!=','id_fac',0]);

        }elseif ($flag==3){

            $query=$query->where(['approve'=>0])->andwhere(['enabel_view'=>0])->andFilterWhere(['!=','id_fac',0]);
            
        }elseif ($flag==1){
            $query=$query->where(['approve'=>0])->andwhere(['enabel_view'=>1])->andWhere(['id_fac'=>0]);
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
            'id_fac' => $this->id_fac,
            'end_number' => $this->end_number,
            'price' => $this->price,
            'peygiri' => $this->peygiri,
        ]);

        $query->andFilterWhere(['like', 'date', $this->date]);

        return $dataProvider;
    }
}
