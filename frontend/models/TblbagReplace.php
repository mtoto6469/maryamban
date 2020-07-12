<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblbag_replace".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_pro
 * @property integer $count
 * @property integer $id_fac
 * @property integer $enabel
 * @property integer $enabel_view
 * @property integer $down_buy
 * @property integer $size
 * @property string $color
 * @property integer $id_all_post
 * @property integer $price
 * @property integer $id_replace
 * @property integer $id_bag
 */
class TblbagReplace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblbag_replace';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_pro', 'size', 'color', 'price', 'id_replace'], 'required'],
            [['id_user', 'id_pro', 'count', 'id_fac', 'enabel', 'enabel_view', 'down_buy', 'size', 'id_all_post', 'price', 'id_replace', 'id_bag'], 'integer'],
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
            'id_user' => Yii::t('app', 'Id User'),
            'id_pro' => Yii::t('app', 'Id Pro'),
            'count' => Yii::t('app', 'Count'),
            'id_fac' => Yii::t('app', 'Id Fac'),
            'enabel' => Yii::t('app', 'Enabel'),
            'enabel_view' => Yii::t('app', 'Enabel View'),
            'down_buy' => Yii::t('app', 'Down Buy'),
            'size' => Yii::t('app', 'Size'),
            'color' => Yii::t('app', 'Color'),
            'id_all_post' => Yii::t('app', 'Id All Post'),
            'price' => Yii::t('app', 'Price'),
            'id_replace' => Yii::t('app', 'Id Replace'),
            'id_bag' => Yii::t('app', 'Id Bag'),
        ];
    }
}
