<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Tblprofile]].
 *
 * @see Tblprofile
 */
class TblprofileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tblprofile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tblprofile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
