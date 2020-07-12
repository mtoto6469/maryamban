<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblproduct".
 *
 * @property integer $id
 * @property integer $id_category
 * @property integer $id_type
 * @property integer $id_brand
 * @property string $size
 * @property string $color
 * @property integer $price
 * @property string $img
 * @property string $description
 */
class Tblproduct extends \yii\db\ActiveRecord
{
   public $size;

    public static function tableName()
    {
        return 'tblproduct';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_category', 'price','price_namayande', 'img','time','size','name'], 'required'],
            [['id_category', 'id_type', 'id_brand', 'price','enabel','enabel_view','price_namayande','pak'], 'integer'],
            [['description','time_ir'], 'string'],
            [['size'], 'string', 'max' =>900],
//            [['time'],'date'],
            [[ 'img','name'], 'string', 'max' => 900],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه محصول'),
            'id_category' => Yii::t('app', 'دسته'),
            'id_type' => Yii::t('app', 'جنس'),
            'id_brand' => Yii::t('app', 'برند'),
            'size' => Yii::t('app', 'سایز'),
            'price' => Yii::t('app', 'قیمت'),
            'price_namayande'=>Yii::t('app','قیمت برای نماینده'),
            'img' => Yii::t('app', 'عکس'),
            'description' => Yii::t('app', 'توضیحات'),
            'time'=>Yii::t('app','زمان'),
            'name'=>'نام محصول',
        ];
    }

    /**
     * @inheritdoc
     * @return TblproductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblproductQuery(get_called_class());
    }
}
