<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tblpardakht]].
 *
 * @see Tblpardakht
 */
class TblpardakhtQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tblpardakht[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tblpardakht|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
