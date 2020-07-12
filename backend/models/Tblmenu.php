<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblmenu".
 *
 * @property integer $id_menu
 * @property integer $id_category
 * @property integer $position
 * @property integer $enable
 */
class Tblmenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblmenu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_category', 'position', 'enable'], 'required'],
            [[ 'id_category', 'position', 'enable'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_menu' => 'شناسه',
            'id_category' => 'شناسه دسته بندی',
            'position' => 'محل قرارگیری',
            'enable' => 'قابل نمایش',
        ];
    }

    /**
     * @inheritdoc
     * @return TblmenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblmenuQuery(get_called_class());
    }
}
