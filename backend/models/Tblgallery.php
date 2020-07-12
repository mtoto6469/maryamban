<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblgallery".
 *
 * @property integer $id
 * @property string $title
 * @property string $address
 * @property string $alert
 * @property integer $and_web
 * @property string $description
 * @property integer $enable
 * @property integer $enable_view
 */
class Tblgallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblgallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'address', 'alert', 'and_web', 'description', 'enable', 'enable_view'], 'required'],
            [['address', 'description'], 'string'],
            [['and_web', 'enable', 'enable_view'], 'integer'],
            [['title', 'alert'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه'),
            'title' => Yii::t('app', 'عنوان'),
            'address' => Yii::t('app', 'آدرس'),
            'alert' => Yii::t('app', 'نوشته عکس'),
            'and_web' => Yii::t('app', 'موبایل یا سایت'),
            'description' => Yii::t('app', 'توضیحات'),
            'enable' => Yii::t('app', 'قابل نمایش'),
            'enable_view' => Yii::t('app', 'حذف'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblgalleryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblgalleryQuery(get_called_class());
    }
}
