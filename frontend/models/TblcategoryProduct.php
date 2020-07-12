<?php

namespace frontend\models;

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
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'id_parent' => Yii::t('app', 'Id Parent'),
            'enabel' => Yii::t('app', 'Enabel'),
            'enabel_view' => Yii::t('app', 'Enabel View'),
        ];
    }
}
