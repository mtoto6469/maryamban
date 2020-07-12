<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblexist".
 *
 * @property integer $id
 * @property string $name_pro
 * @property string $size
 * @property string $color
 * @property integer $enabel_view
 * @property integer $exist
 */
class Tblexist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblexist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pro', 'size', 'color', 'exist'], 'required'],
            [[ 'size','enabel_view', 'exist'], 'integer'],
            [[ 'color'], 'string', 'max' => 300],
            // [['id_pro'], 'exist', 'skipOnError' => true, 'targetClass' => Tblproduct::className(), 'targetAttribute' => ['id_pro' => 'id']],

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
            'size' => Yii::t('app', 'سایز'),
            'color' => Yii::t('app', 'رنگ بندی'),
            'enabel_view' => Yii::t('app', 'حذف'),
            'exist' => Yii::t('app', 'تعداد'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblexistQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblexistQuery(get_called_class());
    }

    public function getIdPro()
    {
        return $this->hasOne(Tblproduct::className(), ['id' => 'id_pro']);
    }
}
