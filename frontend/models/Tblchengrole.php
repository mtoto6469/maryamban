<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblchengrole".
 *
 * @property integer $id
 * @property integer $id_pro
 * @property string $description
 * @property integer $confirm
 * @property integer $enabel_view
 * @property string $date
 * @property string $date_ir
 */
class Tblchengrole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblchengrole';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pro', 'description', 'date', 'date_ir'], 'required'],
            [['id_pro', 'confirm', 'enabel_view'], 'integer'],
            [['date'], 'safe'],
            [['description', 'date_ir'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه'),
            'id_pro' => Yii::t('app', 'شناسه محصول'),
            'description' => Yii::t('app', 'توضیحات'),
            'confirm' => Yii::t('app', 'تایید'),
            'enabel_view' => Yii::t('app', 'حذف'),
            'date' => Yii::t('app', 'تاریخ'),
            'date_ir' => Yii::t('app', 'تاریخ ایران'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblchengroleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblchengroleQuery(get_called_class());
    }
}
