<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Tblbrand]].
 *
 * @see Tblbrand
 */
class TblbrandQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tblbrand[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tblbrand|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
