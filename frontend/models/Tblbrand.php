<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblbrand".
 *
 * @property integer $id
 * @property string $brand
 * @property string $description
 * @property integer $enabel
 * @property integer $enabel_view
 */
class Tblbrand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblbrand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['enabel', 'enabel_view'], 'integer'],
            [['brand'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'brand' => Yii::t('app', 'Brand'),
            'description' => Yii::t('app', 'Description'),
            'enabel' => Yii::t('app', 'Enabel'),
            'enabel_view' => Yii::t('app', 'Enabel View'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblbrandQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblbrandQuery(get_called_class());
    }
}
