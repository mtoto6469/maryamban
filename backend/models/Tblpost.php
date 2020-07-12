<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblpost".
 *
 * @property integer $id
 * @property integer $id_group
 * @property string $title
 * @property string $text_web
 * @property integer $id_img_mob
 * @property integer $id_img_web
 * @property string $id_category_post
 * @property integer $enable
 * @property integer $enable_view
 * @property string $tag
 * @property string $keyword
 * @property string $link
 * @property integer $type
 * @property string $time
 * @property string $time_ir
 * @property integer $user_id
 * @property string $id_position
 * @property string $description
 * @property string $status
 */
class Tblpost extends \yii\db\ActiveRecord
{
    public $serch;
    public $serchpost;
    public $arr;
    public static function tableName()
    {
        return 'tblpost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'keyword', 'type', 'time', 'time_ir', 'user_id','title', 'enable'], 'required'],
            [['id_group', 'id_img_mob', 'id_img_web', 'enable', 'enable_view', 'type', 'user_id','id_category_post'], 'integer'],
            [['text_web', 'id_position', 'description'], 'string'],
            [['time'], 'safe'],
            [['title', 'tag', 'keyword', 'link', 'time_ir', 'status'], 'string', 'max' => 300],
            ['title', 'unique', 'targetClass' => '\backend\models\Tblpost', 'message' => 'این عنوان قبلا استفاده شده است.'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'id_group' => 'گروه',
            'title' => 'عنوان',
            'text_web' => 'متن',
            'id_img_mob' => 'عکس موبایل',
            'id_img_web' => 'عکس دسکتاپ',
            'id_category_post' => 'والد',
            'enable' => Yii::t('app', 'قابل نمایش'),
            'enable_view' => Yii::t('app', 'حذف'),
            'tag' => Yii::t('app', 'تگ'),
            'keyword' => Yii::t('app', 'کلمه کلیدی'),
            'link' => Yii::t('app', 'لینک'),
            'type' => Yii::t('app', 'برگه\پست'),
            'time' => Yii::t('app', 'تاریخ'),
            'time_ir' => Yii::t('app', 'تاریخ شمسی'),
            'user_id' => Yii::t('app', 'شناسه کاربر'),
            'id_position' => Yii::t('app', 'شناسه فرزند'),
            'description' => Yii::t('app', 'توضیحات'),
            'status' => Yii::t('app', 'وضعیت'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblpostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblpostQuery(get_called_class());
    }
}
