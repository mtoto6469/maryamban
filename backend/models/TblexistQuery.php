<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tblexist]].
 *
 * @see Tblexist
 */
class TblexistQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tblexist[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tblexist|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
