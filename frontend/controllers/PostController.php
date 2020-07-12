<?php

namespace frontend\controllers;

use frontend\models\TblpostPage;
use Yii;
use frontend\models\Tblpost;
use frontend\models\TblpostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Tblpost model.
 */
class PostController extends Controller
{
    /**
     * @inheritdoc
     */
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






    public function actionText($id)
    {


        $model=Tblpost::find()->where(['id'=>$id])->one();
        $post=TblpostPage::find()->where(['id_psge'=>$id])->all();


        if($model){
            \Yii::$app->view->registerMetaTag([
                'name' => 'keyword',
                'content' => $model->keyword,
                'id'=>"main_index"
            ],"main_index");



            \Yii::$app->view->registerMetaTag([
                'name' => 'url',
                'content' => $model->link,
                'id'=>"link"
            ],"link");


            \Yii::$app->view->registerMetaTag([
                'name' => 'description',
                'content' => $model->description,
                'id'=>"description"
            ],"description");
        }






        \Yii::$app->view->registerMetaTag([
            'name' => 'title',
            'content' => 'افراپارتیشن - تولید کننده پارتیشن اداری و پاراوان و نمایندگی پخش قفس',
            'id'=>"title"
        ],"title");



        return $this->render('text',[
            'model'=>$model,
            'post'=>$post,
        ]);
    }

    
   


}
