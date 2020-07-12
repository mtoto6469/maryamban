<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblcategory_product".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $id_parent
 * @property integer $enabel
 * @property integer $enabel_view
 */
class TblcategoryProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblcategory_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           
            [['name'], 'required'],
            [['description'], 'string'],
            [['id_parent', 'enabel', 'enabel_view'], 'integer'],
            [['name'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'نام محصول'),
            'description' => Yii::t('app', 'توضیحات'),
            'id_parent' => Yii::t('app', 'والد'),
            'enabel' => Yii::t('app', 'قابل نمایش'),
            'enabel_view' => Yii::t('app', 'Enabel View'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblcategoryProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblcategoryProductQuery(get_called_class());
    }
}
