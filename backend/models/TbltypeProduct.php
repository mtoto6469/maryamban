<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbltype_product".
 *
 * @property integer $id
 * @property string $type
 * @property string $description
 * @property integer $id_parent
 * @property integer $enabel
 * @property integer $enabel_view
 */
class TbltypeProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbltype_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['type'], 'required'],
            [['description'], 'string'],
            [['id_parent', 'enabel', 'enabel_view'], 'integer'],
            [['type'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'جنس'),
            'description' => Yii::t('app', 'توضیحات'),
            'id_parent' => Yii::t('app', 'والد'),
            'enabel' => Yii::t('app', 'قابل نمابش'),
            'enabel_view' => Yii::t('app', 'Enabel View'),
        ];
    }

    /**
     * @inheritdoc
     * @return TbltypeProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TbltypeProductQuery(get_called_class());
    }
}
