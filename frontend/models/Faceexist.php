<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "faceexist".
 *
 * @property integer $id
 * @property integer $id_fac
 * @property integer $id_user
 * @property integer $id_exist
 * @property integer $exist
 * @property integer $id_bag
 */
class Faceexist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faceexist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fac', 'id_user', 'id_exist', 'exist', 'id_bag'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_fac' => Yii::t('app', 'Id Fac'),
            'id_user' => Yii::t('app', 'Id User'),
            'id_exist' => Yii::t('app', 'Id Exist'),
            'exist' => Yii::t('app', 'Exist'),
            'id_bag' => Yii::t('app', 'Id Bag'),
        ];
    }

    /**
     * @inheritdoc
     * @return FaceexistQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FaceexistQuery(get_called_class());
    }
}
