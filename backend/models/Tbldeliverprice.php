<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbldeliverprice".
 *
 * @property integer $id
 * @property string $name
 * @property integer $price
 */
class Tbldeliverprice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbldeliverprice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['price'], 'integer'],
            [['name'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'نام '),
            'price' => Yii::t('app', 'هزینه'),
        ];
    }

    /**
     * @inheritdoc
     * @return TbldeliverpriceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TbldeliverpriceQuery(get_called_class());
    }
}
