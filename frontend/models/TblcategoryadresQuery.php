<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Tblcategoryadres]].
 *
 * @see Tblcategoryadres
 */
class TblcategoryadresQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tblcategoryadres[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tblcategoryadres|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
