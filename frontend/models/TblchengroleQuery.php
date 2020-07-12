<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Tblchengrole]].
 *
 * @see Tblchengrole
 */
class TblchengroleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tblchengrole[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tblchengrole|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
