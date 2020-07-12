<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblexist".
 *
 * @property integer $id
 * @property integer $id_pro
 * @property integer $size
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
            [['id_pro', 'size', 'enabel_view', 'exist'], 'integer'],
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
            'size' => Yii::t('app', 'Size'),
            'color' => Yii::t('app', 'Color'),
            'enabel_view' => Yii::t('app', 'Enabel View'),
            'exist' => Yii::t('app', 'Exist'),
        ];
    }
}
