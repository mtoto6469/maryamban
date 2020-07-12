<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tblcategory]].
 *
 * @see Tblcategory
 */
class TblcategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tblcategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tblcategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
