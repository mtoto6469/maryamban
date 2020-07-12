<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblcolor".
 *
 * @property integer $id
 * @property integer $id_pro
 * @property integer $enabel
 * @property integer $enabel_view
 * @property string $color
 */
class Tblcolor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblcolor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pro', 'color','img'], 'required'],
            [['id_pro', 'enabel', 'enabel_view'], 'integer'],
            [['color','img'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_pro' => Yii::t('app', 'شناسه محصول'),
            'enabel' => Yii::t('app', 'قابل نمایشl'),
            'enabel_view' => Yii::t('app', 'حذف'),
            'color' => Yii::t('app', 'رنگ'),
            'img'=>Yii::t('app','عکس'),
        ];
    }

    /**
     * @inheritdoc
     * @return TTblcolorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TTblcolorQuery(get_called_class());
    }
}
