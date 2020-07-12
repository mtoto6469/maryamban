<?php
/**
 * Created by PhpStorm.
 * User: amhso
 * Date: 24/10/2017
 * Time: 04:44 PM
 */
namespace frontend\models;


use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs( \Yii::getAlias('@upload').'/upload/'. $this->imageFile->baseName . '.' . $this->imageFile->extension);

            $attach=new Attach();
            
            $attach->address=$this->imageFile->baseName . '.' . $this->imageFile->extension;
            $attach->title="فایل ضمیمه";
           
            if($attach->save())
                return $attach->id;
            else
                return 0;



        } else {
            return 0;
        }
    }
}