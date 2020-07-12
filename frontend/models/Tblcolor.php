<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblcolor".
 *
 * @property integer $id
 * @property integer $id_pro
 * @property integer $enabel
 * @property integer $enabel_view
 * @property string $color
 * @property integer $img
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
            [['id_pro', 'color', 'img'], 'required'],
            [['id_pro', 'enabel', 'enabel_view', 'img'], 'integer'],
            [['color'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_pro' => Yii::t('app', 'Id Pro'),
            'enabel' => Yii::t('app', 'Enabel'),
            'enabel_view' => Yii::t('app', 'Enabel View'),
            'color' => Yii::t('app', 'Color'),
            'img' => Yii::t('app', 'Img'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblcolorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblcolorQuery(get_called_class());
    }
}
