<?php

namespace backend\controllers;

use backend\models\Tbldeliverprice;
use backend\models\Tbldiscount;
use backend\models\Tblproduct;
use backend\models\Tblprofile;
use frontend\models\Tblallpost;
use frontend\models\Tblbag;
use Yii;
use backend\models\Tblreplace;
use backend\models\TblreplaceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReplaceController implements the CRUD actions for Tblreplace model.
 */
class ReplaceController extends Controller
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

    /**
     * Lists all Tblreplace models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblreplaceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblreplace model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tblreplace model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblreplace();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tblreplace model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$flag)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($flag==1){
                $model->confirm=1;
                if($model->post_price==1){
                $post=Tbldeliverprice::find()->where(['id'=>2])->one();
                    if($model->new_count==1){
                        $price_post=$post->price;
                    }else{
                        $price_post=(($model->new_count-1) * 2000)+$post->price;
                    }
                    $bag=Tblbag::find()->where(['id'=>$model->id_bag])->one();
                    $pro=Tblproduct::find()->where(['id'=>$bag->id_pro])->one();
                    $dis=Tbldiscount::find()->where(['id'=>$bag->id_discount])->one();
                    $price=$pro->price_namayande * $model->new_count;
                    $dis_price=$price-($price * $dis->price/100);
                    $end_price= $dis_price + $price_post;
                    $model->price_cr=$end_price;
                    $model->enabel_view=0;
                    $model->save();
                    $profile=Tblprofile::find()->where(['user_id'=>$model->id_user])->one();
                    $profile->mande+=$end_price;
//                    $profile->date_credit;
                    $profile->save();
                }else{


                    $bag=Tblbag::find()->where(['id'=>$model->id_bag])->one();
                    $pro=Tblproduct::find()->where(['id'=>$bag->id_pro])->one();
                    $dis=Tbldiscount::find()->where(['id'=>$bag->id_discount])->one();
                    $price=$pro->price_namayande * $model->new_count;
                    $dis_price=$price-($price * $dis->price/100);
                    $end_price= $dis_price ;
                    $model->price_cr=$end_price;
                    $model->enabel_view=0;
                    $model->save();
                    $profile=Tblprofile::find()->where(['user_id'=>$model->id_user])->one();
                    $profile->mande+=$end_price;
//                    $profile->date_credit;
                    $profile->save();
                    $model->enabel_view=0;
                    $model->save();
                }

            }else{
                $model->confirm=0;
                $model->enabel_view=0;
                $model->save();
            }


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'flag'=>$flag,
            ]);
        }
    }

    /**
     * Deletes an existing Tblreplace model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tblreplace model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblreplace the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblreplace::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
