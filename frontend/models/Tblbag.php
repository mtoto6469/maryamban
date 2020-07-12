<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblbag".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_pro
 * @property integer $count
 * @property string $date
 * @property string $date_ir
 * @property integer $id_fac
 * @property integer $enabel
 * @property integer $enable_view
 * @property integer $down_buy
 * @property string $size
 * @property string $color
 * @property integer $id_all_post
 * @property integer $price
 * @property integer $pak
 */
class Tblbag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblbag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_pro', 'date', 'date_ir', 'size', 'color', 'price'], 'required'],
            [['id_user', 'id_pro', 'count', 'id_fac', 'enabel', 'enable_view', 'down_buy', 'id_all_post', 'price', 'id_discount', 'size'], 'integer'],
            [['date'], 'safe'],
            [['date_ir', 'color'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_user' => Yii::t('app', 'Id User'),
            'id_pro' => Yii::t('app', 'Id Pro'),
            'count' => Yii::t('app', 'Count'),
            'date' => Yii::t('app', 'Date'),
            'date_ir' => Yii::t('app', 'Date Ir'),
            'id_fac' => Yii::t('app', 'Id Fac'),
            'enabel' => Yii::t('app', 'Enabel'),
            'enable_view' => Yii::t('app', 'Enable View'),
            'down_buy' => Yii::t('app', 'Down Buy'),
            'size' => Yii::t('app', 'Size'),
            'color' => Yii::t('app', 'Color'),
            'id_all_post' => Yii::t('app', 'Id All Post'),
            'price' => Yii::t('app', 'Price'),
            'pak' => Yii::t('app', 'Pak'),
        ];
    }
}
