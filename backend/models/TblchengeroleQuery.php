<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tblchengerole]].
 *
 * @see Tblchengerole
 */
class TblchengeroleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tblchengerole[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tblchengerole|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
