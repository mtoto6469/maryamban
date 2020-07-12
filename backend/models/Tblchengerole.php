<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblchengerole".
 *
 * @property integer $id
 * @property integer $id_fac
 * @property string $date
 * @property string $time
 * @property integer $enabel
 * @property string $description
 */
class Tblchengerole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblchengerole';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fac', 'date', 'time'], 'required'],
            [['id_fac', 'enabel'], 'integer'],
            [['date'], 'safe'],
            [['time', 'description'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_fac' => Yii::t('app', 'Id Fac'),
            'date' => Yii::t('app', 'Date'),
            'time' => Yii::t('app', 'Time'),
            'enabel' => Yii::t('app', 'Enabel'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblchengeroleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblchengeroleQuery(get_called_class());
    }
}
