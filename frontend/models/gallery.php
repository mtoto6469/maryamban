<?php
/**
 * Created by PhpStorm.
 * User: 04
 * Date: 08/26/2017
 * Time: 11:33 AM
 */

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
class gallery extends Model
{
   
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(Yii::getAlias('@upload').'/upload/'. $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    
    }

    

}