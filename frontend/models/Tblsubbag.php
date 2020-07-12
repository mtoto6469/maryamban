<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblsubbag".
 *
 * @property integer $id
 * @property integer $id_bag
 * @property integer $enabel_view
 * @property integer $id_all_post
 */
class Tblsubbag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblsubbag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bag'], 'required'],
            [['id_bag', 'enabel_view', 'id_all_post'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_bag' => Yii::t('app', 'Id Bag'),
            'enabel_view' => Yii::t('app', 'Enabel View'),
            'id_all_post' => Yii::t('app', 'Id All Post'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblsubbagQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblsubbagQuery(get_called_class());
    }
}
