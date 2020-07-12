<?php

namespace frontend\models;

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
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'address' => Yii::t('app', 'Address'),
            'alert' => Yii::t('app', 'Alert'),
            'and_web' => Yii::t('app', 'And Web'),
            'description' => Yii::t('app', 'Description'),
            'enable' => Yii::t('app', 'Enable'),
            'enable_view' => Yii::t('app', 'Enable View'),
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
