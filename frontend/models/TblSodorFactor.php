<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_sodor_factor".
 *
 * @property integer $id
 * @property integer $id_ref
 * @property integer $price
 * @property string $description
 * @property integer $id_user
 * @property string $data
 * @property string $data_ir
 * @property integer $resive
 * @property integer $visibel
 * @property string $adress
 * @property integer $id_city
 * @property integer $code_off
 * @property integer $off
 * @property string $date_deliver
 * @property integer $confirm
 */
class TblSodorFactor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_sodor_factor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ref', 'price', 'id_user', 'resive', 'visibel', 'print', 'code_off', 'off', 'confirm'], 'integer'],
            [['id_user'], 'required'],
            [['data', 'date_deliver'], 'safe'],
            [['adress'], 'string'],
            [['description'], 'string', 'max' => 500],
            [['data_ir'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_ref' => Yii::t('app', 'Id Ref'),
            'price' => Yii::t('app', 'هزینه فاکتور'),
            'description' => Yii::t('app', 'توضیحات فاکتور'),
            'id_user' => Yii::t('app', 'Id User'),
            'data' => Yii::t('app', 'تاریخ '),
            'data_ir' => Yii::t('app', 'تاریخ فاکتور'),
            'resive' => Yii::t('app', 'ارسال'),
            'visibel' => Yii::t('app', 'دیده شد'),
            'print'=>Yii::t('app','بسته بندی شد'),
            'adress' => Yii::t('app', 'Adress'),
            'print' => Yii::t('app', 'Id City'),
            'code_off' => Yii::t('app', 'Code Off'),
            'off' => Yii::t('app', 'Off'),
            'date_deliver' => Yii::t('app', 'Date Deliver'),
            'confirm' => Yii::t('app', 'Confirm'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblSodorFactorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblSodorFactorQuery(get_called_class());
    }
}
