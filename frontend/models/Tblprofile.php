<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblprofile".
 *
 * @property integer $id
 * @property string $name
 * @property string $lastname
 * @property integer $user_id
 * @property string $role
 * @property integer $tel
 * @property string $address
 * @property integer $enable_view
 * @property integer $Credit
 * @property string $date_Credit
 */
class Tblprofile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $username;
    public $password;
    public static function tableName()
    {
        return 'tblprofile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lastname', 'user_id', 'tel'], 'required'],
            [['user_id', 'tel', 'enable_view', 'credit'], 'integer'],
            [['address'], 'string'],
            [['date_credit'], 'safe'],
            [['name', 'lastname', 'role'], 'string', 'max' => 300],
            ['username','string'],
            ['password', 'string', 'min' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'lastname' => Yii::t('app', 'Lastname'),
            'user_id' => Yii::t('app', 'User ID'),
            'role' => Yii::t('app', 'Role'),
            'tel' => Yii::t('app', 'Tel'),
            'address' => Yii::t('app', 'Address'),
            'enable_view' => Yii::t('app', 'Enable View'),
            'credit' => Yii::t('app', 'credit'),
            'date_credit' => Yii::t('app', 'Date  credit'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblprofileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblprofileQuery(get_called_class());
    }
}
