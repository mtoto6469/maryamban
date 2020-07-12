<?php

namespace backend\models;

use Symfony\Component\Console\Helper\Table;
use Yii;
use yii\web\User;

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
 */
class TblSodorFactor extends \yii\db\ActiveRecord
{
    
    public  $img;
    public $name;
    public $type;
    public $size;
    public $count_pluss;
    public $file;
    public $display;
    public $count;
    public $end_price;
    public $city;
    public $address;
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
            [['id_ref', 'price', 'resive', 'visibel','print','code_off','off'], 'integer'],
            [['id_user', 'data', 'data_ir'], 'required'],
            [['data','date_deliver','id_user'], 'safe'],
            [['description','adress'], 'string', 'max' => 500],
            [['data_ir'], 'string', 'max' => 300],
            // [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => \yii\debug\models\search\User::className(), 'targetAttribute' => ['id_user' => 'id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_ref' => Yii::t('app', 'شماره پیگیری'),
            'price' => Yii::t('app', 'قیمت فاکتور'),
            'description' => Yii::t('app', 'توضیحات'),
            'id_user' => Yii::t('app', 'Id User'),
            'data' => Yii::t('app', 'تاریخ'),
            'data_ir' => Yii::t('app', 'تاریخ'),
            'resive' => Yii::t('app', 'تحویل'),
            'visibel' => Yii::t('app', 'دیده شده'),
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

    public function getIdUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'id_user']);
    }
}
