<?php

namespace frontend\controllers;

use backend\models\Tblpost;
use Yii;
use frontend\models\Tblcategory;
use frontend\models\TblcategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Tblcategory model.
 */
class CategoryController extends Controller
{
    /**
     * @inheritdoc
     */
//    public $layout="shop.php";
    public function behaviors()
    {


        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }



    public function actionPost($id)
    {
        $post=Tblpost::find()->where(['id_category_post'=>$id])->all();
        $cat=Tblcategory::find()->where(['id_parent'=>$id])->all();
        $category_title=Tblcategory::find()->where(['id_category'=>$id])->one();
        return $this->render('post', [
           'post'=>$post,
            'cat'=>$cat,
            'category_title'=>$category_title,
        ]);
    }
    

 

   
    protected function findModel($id)
    {
        if (($model = Tblcategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
