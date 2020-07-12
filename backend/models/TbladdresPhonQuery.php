<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[TbladdresPhon]].
 *
 * @see TbladdresPhon
 */
class TbladdresPhonQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TbladdresPhon[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TbladdresPhon|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
