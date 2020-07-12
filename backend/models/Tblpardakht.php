<?php

namespace backend\models;

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
    public $user;
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
            [['date','admin_description','date_u'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه'),
            'id_fac' => Yii::t('app', 'شناسه فاکتور'),
            'end_number' => Yii::t('app', '4 رقم اخر'),
            'price' => Yii::t('app', 'قیمت پرداخت شده'),
            'date' => Yii::t('app', 'تاریخ و زمان پرداخت'),
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
