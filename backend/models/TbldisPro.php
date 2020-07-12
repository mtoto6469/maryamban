<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbldis_pro".
 *
 * @property integer $id
 * @property integer $id_cat_pro
 * @property integer $id_dis
 */
class TbldisPro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbldis_pro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cat_pro', 'id_dis'], 'required'],
            [['id_cat_pro', 'id_dis','enabel_view'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_cat_pro' => Yii::t('app', 'Id Cat Pro'),
            'id_dis' => Yii::t('app', 'Id Dis'),
        ];
    }

    /**
     * @inheritdoc
     * @return TbldisProQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TbldisProQuery(get_called_class());
    }
}
