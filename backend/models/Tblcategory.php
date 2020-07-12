<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblcategory".
 *
 * @property integer $id_category
 * @property string $title_category
 * @property string $description_category
 * @property integer $enable_category
 * @property integer $enabel_view_category
 * @property integer $id_parent
 * @property integer $group_category
 */
class Tblcategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblcategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_category', 'enable_category','menu_foter' ], 'required'],
            [['enable_category', 'enabel_view_category', 'id_parent', 'group_category','menu_foter'], 'integer'],
            [['title_category', 'description_category'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_category' => 'شناسه',
            'title_category' => 'عنوان دسته',
            'description_category' => 'توضیحات',
            'enabel_category' => 'قابل نمایش',
            'enable_view_category' => 'حذف',
            'id_parent' => 'شناسه والد',
            'group_category' => 'پست / دسته',
            'menu_foter'=>'منو یا فوتر',
        ];
    }

    /**
     * @inheritdoc
     * @return TblcategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblcategoryQuery(get_called_class());
    }
}
