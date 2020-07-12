<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblexist;

/**
 * TblexistSearch represents the model behind the search form about `backend\models\Tblexist`.
 */
class TblexistSearch extends Tblexist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'exist', 'enabel_view'], 'integer'],
            [[ 'id_pro', 'size', 'color'], 'safe'],
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
        $query = Tblexist::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
      $query->joinWith('idPro')->andWhere([
                Tblexist::tableName().'.enabel_view' =>1,
               
            ]);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,

            'exist' => $this->exist,
            'enabel_view' => $this->enabel_view,
        ]);



        $query->andFilterWhere(['like','size',$this->size]) ;
        $query->andFilterWhere(['like','color',$this->color])
            ->andFilterWhere(['like','tblproduct.name',$this->id_pro]);
        return $dataProvider;
    }
}
