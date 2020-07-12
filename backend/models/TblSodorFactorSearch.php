<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblSodorFactor;

/**
 * TblSodorFactorSearch represents the model behind the search form about `backend\models\TblSodorFactor`.
 */
class TblSodorFactorSearch extends TblSodorFactor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_ref', 'price', 'resive', 'visibel'], 'integer'],
            [['description', 'data', 'data_ir', 'id_user'], 'safe'],
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
    public function search($params,$resive,$visibel,$print)
    {
        $query = TblSodorFactor::find()->filterWhere(['!=','id_ref',0]);




            if ($visibel == 0 && $resive == 0 && $print==0) {
                $query = $query->where(['visibel' => 0])->andwhere(['resive' => 0])->andwhere(['print' => 0])->andwhere(['confirm'=>1]);
            }
            if ($visibel == 1 && $resive == 0 && $print==0) {
                $query = $query->where(['visibel' => 1])->andwhere(['resive' => 0])->andwhere(['print' => 0])->andwhere(['confirm'=>1]);

            }

        if ($visibel == 1 && $resive == 0 && $print==1) {
            $query = $query->where(['visibel' => 1])->andwhere(['resive' => 0])->andwhere(['print' => 1])->andwhere(['confirm'=>1]);

        }

            if ($visibel == 1 && $resive == 1 && $print==1) {
                $query = $query->where(['visibel' => 1])->andwhere(['resive' => 1])->andwhere(['print' => 1])->andwhere(['confirm'=>1]);

            }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        $query->joinWith('idUser');
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_ref' => $this->id_ref,
            'price' => $this->price,
            'id_user' => $this->id_user,
            'data' => $this->data,
            'resive' => $this->resive,
            'visibel' => $this->visibel,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'data_ir', $this->data_ir])
            ->andFilterWhere(['like','user.username',$this->id_user]);

        return $dataProvider;
    }
}
