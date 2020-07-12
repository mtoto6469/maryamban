<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[TblpostPage]].
 *
 * @see TblpostPage
 */
class TblpostPageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TblpostPage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TblpostPage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
