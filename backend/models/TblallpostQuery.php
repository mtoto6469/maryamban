<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tblallpost]].
 *
 * @see Tblallpost
 */
class TblallpostQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tblallpost[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tblallpost|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
