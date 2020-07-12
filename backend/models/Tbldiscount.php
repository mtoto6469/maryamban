<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbldiscount".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $all_pro
 * @property integer $price
 * @property integer $enabel
 * @property integer $enabel_view
 * @property integer $price_namayande
 */
class Tbldiscount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public  $product;
    public static function tableName()
    {
        return 'tbldiscount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'all_pro', 'price'], 'required'],
            [['description'], 'string'],
            [['all_pro', 'price', 'enabel', 'enabel_view', 'price_namayande'], 'integer'],
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
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'all_pro' => Yii::t('app', 'All Pro'),
            'price' => Yii::t('app', 'Price'),
            'enabel' => Yii::t('app', 'Enabel'),
            'enabel_view' => Yii::t('app', 'Enabel View'),
            'price_namayande' => Yii::t('app', 'Price Namayande'),
        ];
    }

    /**
     * @inheritdoc
     * @return TbldiscountQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TbldiscountQuery(get_called_class());
    }
}
