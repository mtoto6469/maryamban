<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblmessage".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $title
 * @property string $text
 * @property integer $tell
 * @property integer $id_post
 * @property string $email
 * @property string $date
 * @property string $date_ir
 */
class Tblmessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblmessage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'tell', 'id_post'], 'integer'],
            [['title', 'text', 'date_ir'], 'required'],
            [['text'], 'string'],
            [['title', 'date_ir'], 'string', 'max' => 300],
            [['email', 'date'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'َشناسه'),
            'id_user' => Yii::t('app', 'شناسه کاربر'),
            'title' => Yii::t('app', 'عنوان'),
            'text' => Yii::t('app', 'متن'),
            'tell' => Yii::t('app', 'شماره تماس'),
            'id_post' => Yii::t('app', 'شناسه پست'),
            'email' => Yii::t('app', 'ایمیل'),
            'date' => Yii::t('app', 'تاریخ'),
            'date_ir' => Yii::t('app', 'تاریخ'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblmessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblmessageQuery(get_called_class());
    }
}
