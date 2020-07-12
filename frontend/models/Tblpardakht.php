<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblpardakht".
 *
 * @property integer $id
 * @property integer $id_fac
 * @property integer $end_number
 * @property integer $price
 * @property string $date
 * @property integer $peygiri
 */
class Tblpardakht extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblpardakht';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fac', 'end_number', 'price', 'date', 'peygiri'], 'required'],
            [['id_fac', 'end_number', 'price', 'peygiri','enabel_view','approve','id_user'], 'integer'],
            [['date','admin_description','date_u'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه'),
            'id_fac' => Yii::t('app', 'فاکتورشناسه'),
            'end_number' => Yii::t('app', '4 رقم آخر کارت'),
            'price' => Yii::t('app', 'مبلغ پرداخت'),
            'date' => Yii::t('app', 'تاریخ و ساعت پرداخت'),
            'peygiri' => Yii::t('app', 'شماره پیگیری'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblpardakhtQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblpardakhtQuery(get_called_class());
    }
}
