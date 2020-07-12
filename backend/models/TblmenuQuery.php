<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tblmenu]].
 *
 * @see Tblmenu
 */
class TblmenuQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tblmenu[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tblmenu|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
