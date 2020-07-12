<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblallpost".
 *
 * @property integer $id
 * @property string $address
 * @property integer $price_post
 * @property integer $category
 * @property integer $id_bag
 * @property string $costomer
 * @property integer $tel
 * @property integer $price
 * @property integer $id_user
 * @property integer $down_buy
 */
class Tblallpost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblallpost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price_post', 'category', 'tel', 'price', 'id_user', 'down_buy','id_fac','id_fader'], 'integer'],
            [['id_user'], 'required'],
            [['address', 'costomer', 'name_post'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'address' => Yii::t('app', 'Address'),
            'price_post' => Yii::t('app', 'Price Post'),
            'category' => Yii::t('app', 'Category'),
            'id_bag' => Yii::t('app', 'Id Bag'),
            'costomer' => Yii::t('app', 'Costomer'),
            'tel' => Yii::t('app', 'Tel'),
            'price' => Yii::t('app', 'Price'),
            'id_user' => Yii::t('app', 'Id User'),
            'down_buy' => Yii::t('app', 'Down Buy'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblallpostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblallpostQuery(get_called_class());
    }
}
