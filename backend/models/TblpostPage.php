<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblpost_page".
 *
 * @property integer $id
 * @property integer $id_post
 * @property integer $id_psge
 */
class TblpostPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblpost_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_post', 'id_psge'], 'required'],
            [['id_post', 'id_psge'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_post' => Yii::t('app', 'Id Post'),
            'id_psge' => Yii::t('app', 'Id Psge'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblpostPageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblpostPageQuery(get_called_class());
    }
}
