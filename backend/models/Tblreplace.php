<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblreplace".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_pro
 * @property integer $id_fac
 * @property string $text_user
 * @property integer $category
 * @property integer $confirm
 * @property string $text_admin
 * @property integer $post_price
 * @property integer $enabel_view
 * @property integer $id_bag
 */
class Tblreplace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblreplace';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_pro', 'id_fac', 'category', 'confirm', 'post_price', 'enabel_view', 'id_bag','new_size','new_count','price_cr'], 'integer'],
            [['text_user', 'text_admin'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_user' => Yii::t('app', 'کاربر'),
            'id_pro' => Yii::t('app', 'محصول'),
            'id_fac' => Yii::t('app', 'شماره فاکتور'),
            'text_user' => Yii::t('app', 'درخواست کاربر'),
            'category' => Yii::t('app', 'Category'),
            'confirm' => Yii::t('app', 'وضعیت'),
            'text_admin' => Yii::t('app', 'پاسخ مدیریت'),
            'post_price' => Yii::t('app', 'هزینه پست'),
            'enabel_view' => Yii::t('app', 'Enabel View'),
            'id_bag' => Yii::t('app', 'Id Bag'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblreplaceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblreplaceQuery(get_called_class());
    }
}
