<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[TbldisPro]].
 *
 * @see TbldisPro
 */
class TbldisProQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TbldisPro[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TbldisPro|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
