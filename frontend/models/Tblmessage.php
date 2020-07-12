<?php

namespace frontend\models;

use common\components\jdf;
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

        $date=new jdf();
        $date=$date->date('y/m/d');
        return [
            [['id_user', 'tell', 'id_post'], 'integer'],
            [['title', 'text'], 'required'],
            [['text'], 'string'],
            [['title', 'date_ir'], 'string', 'max' => 300],
            [['email', 'date'], 'string', 'max' => 250],



            ['date_ir','default','value'=>$date]
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
            'title' => Yii::t('app', 'موضوع'),
            'text' => Yii::t('app', 'پیام'),
            'tell' => Yii::t('app', 'تلفن'),
            'id_post' => Yii::t('app', 'Id Post'),
            'email' => Yii::t('app', 'ایمیل'),
            'date' => Yii::t('app', 'تاریخ'),
            'date_ir' => Yii::t('app', 'تاریخ ایران'),
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
