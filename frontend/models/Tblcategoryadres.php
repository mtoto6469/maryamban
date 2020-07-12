<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblcategoryadres".
 *
 * @property integer $id
 * @property integer $category
 */
class Tblcategoryadres extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblcategoryadres';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category'], 'required'],
            [['category'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category' => Yii::t('app', 'Category'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblcategoryadresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblcategoryadresQuery(get_called_class());
    }
}
