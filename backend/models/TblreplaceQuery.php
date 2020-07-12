<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tblreplace]].
 *
 * @see Tblreplace
 */
class TblreplaceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tblreplace[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tblreplace|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
