<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[TblcategoryProduct]].
 *
 * @see TblcategoryProduct
 */
class TblcategoryProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TblcategoryProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TblcategoryProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
