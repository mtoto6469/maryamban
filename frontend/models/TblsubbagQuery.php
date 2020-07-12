<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Tblsubbag]].
 *
 * @see Tblsubbag
 */
class TblsubbagQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tblsubbag[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tblsubbag|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
