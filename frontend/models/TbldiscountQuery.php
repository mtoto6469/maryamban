<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Tbldiscount]].
 *
 * @see Tbldiscount
 */
class TbldiscountQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tbldiscount[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tbldiscount|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
