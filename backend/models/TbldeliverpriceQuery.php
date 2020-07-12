<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tbldeliverprice]].
 *
 * @see Tbldeliverprice
 */
class TbldeliverpriceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tbldeliverprice[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tbldeliverprice|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
