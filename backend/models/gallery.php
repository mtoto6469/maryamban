<?php
/**
 * Created by PhpStorm.
 * User: 04
 * Date: 08/26/2017
 * Time: 11:33 AM
 */

namespace backend\models;


use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
class gallery extends Model
{
    public $imageFiles;
    public $id;
    public function rules()

    {
        return [
//        [['imageFiles'], 'file', 'skipOnEmpty' => false,'extensions' => 'png, jpg,jpeg' ,'maxFiles' => 4],
            ];
    }

    /**
     * @param $model_old
     * @return int
     */
    public function upload($model_old)
    {

        if ($this->validate()) {
            $url=Yii::$app->urlManager;
            foreach ($this->imageFiles as $file) {
                $model_new= new Tblgallery();
                $file->saveAs( Yii::getAlias('@upload').'/upload/'. $file->baseName . '.' . $file->extension);
                $model_new->address=$file->baseName.'.'. $file->extension;
                $model_new->title = $model_old->title;
                $model_new->alert = $model_old->alert;
                $model_new->and_web = $model_old->and_web;
                $model_new->description = $model_old->description;
                $model_new->enable= $model_old->enable;
                $model_new->enable_view = 1;
           $model_new->save();

            }

            return $this->id=$model_new->id;
        }else{
            return 0;
        }

    }

    

}