<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbladdres_phon".
 *
 * @property integer $id
 * @property string $address
 * @property string $tel
 */
class TbladdresPhon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbladdres_phon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'address', 'tel'], 'required'],
            [['id'], 'integer'],
            [['address'], 'string'],
            [['tel'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'address' => Yii::t('app', 'آدرس'),
            'tel' => Yii::t('app', 'تلفن'),
        ];
    }
}
