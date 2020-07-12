<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Tblbag]].
 *
 * @see Tblbag
 */
class TblbagQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tblbag[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tblbag|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
