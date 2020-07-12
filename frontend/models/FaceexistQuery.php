<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Faceexist]].
 *
 * @see Faceexist
 */
class FaceexistQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Faceexist[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Faceexist|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
