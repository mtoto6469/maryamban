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
class upload extends Model
{

    public $image;

    public function rules()
    {
        return [
            [['image'], 'file'],
        ];
    }
    

}