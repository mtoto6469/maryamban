<?php

namespace frontend\controllers;

use backend\models\Tbldeliverprice;
use backend\models\TbldisPro;
use frontend\models\Tblallpost;
use frontend\models\Tblbag;
use frontend\models\Tbldiscount;
use frontend\models\Tblproduct;
use frontend\models\TblSodorFactor;
use Yii;
use frontend\models\TblbagReplace;
use frontend\models\TblbagReplaceSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BagreplaceController implements the CRUD actions for TblbagReplace model.
 */
class BagreplaceController extends Controller
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
     * Lists all TblbagReplace models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblbagReplaceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblbagReplace model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }



    
    public function actionChenge($id)
        
    {

        $fac = TblSodorFactor::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['resive' => 1])->andWhere(['confirm' => 1])->all();

        $model = new TblbagReplace();
        $allpost= new Tblallpost();
        $deliver=ArrayHelper::map(Tbldeliverprice::find()->all(),'id','name');

        if (Yii::$app->request->post()) {

            if(isset($_POST["check"])){
                
                $newbag=TblbagReplace::find()->where(['id'=>$id])->one();
                $oldbag=Tblbag::find()->where(['id'=>$_POST['check']])->one();
                if($newbag->price >= $oldbag->price){
                    $newbag->id_replace=$oldbag->id;
                    $newbag->save();

                    $postprice=\frontend\models\Tblreplace::find()->where(['id_bag'=>$_POST["check"]])->andWhere(['id_user'=>Yii::$app->user->getId()])->one();
                    if($postprice->post_price==1){


                    }else{
                        
                        if(isset($_POST['adres'])){
                            if($_POST['adres']!=null){
                                $allpost= new Tblallpost();
                                $allpost->id_fader=$_POST['adres'];
                                $old=Tblallpost::find()->where(['id'=>$_POST['adres']])->one();
                                $allpost->address=$old->address;
                                $allpost->costomer=$old->costomer;
                                $allpost->tel=$old->tel;

                                if($allpost->price_post==1){ //tipax
                                    $allpost->price_post = 0;
                                    $allpost->name_post='tipax';
                                }elseif ($allpost->price_post==3){ //peykmotori
                                    $allpost->price_post = 0;
                                    $allpost->name_post='payk';
                                }elseif($allpost->price_post==2){
                                    $allpost->price_post=0;
                                    $allpost->name_post='post';

                                }

                                $allpost->id_user=Yii::$app->user->getId();
                                $allpost->down_buy=0;
                                $allpost->save();
                            }else{
                                if($allpost->address!=null){
                                    $allpost= new Tblallpost();
                                    $allpost->id_fader=0;
                                    if($allpost->price_post==1){ //tipax
                                        $allpost->price_post = 0;
                                        $allpost->name_post='tipax';
                                    }elseif ($allpost->price_post==3){ //peykmotori
                                        $payk=Tbldeliverprice::find()->where(['id'=>3])->one();
                                        $allpost->price_post = $payk->price;
                                        $allpost->name_post='payk';
                                    }elseif($allpost->price_post==2){
                                        $post=Tbldeliverprice::find()->where(['id'=>2])->one();
                                        $allpost->price_post=$post->price;
                                        $allpost->name_post='post';

                                    }

                                    $allpost->id_user=Yii::$app->user->getId();
                                    $allpost->down_buy=0;
                                    $allpost->save();
                                }else{
                                    $_SESSION['error_adres']="آدرس نمی تواند خالی باشد";
                                    return $this->render('chenge', [
                                        'model' => $model,
                                        'fac'=>$fac,
                                    ]);
                                }

                            }

                        }else{
                            if($allpost->address!=null){
                                $allpost->id_fader=0;
                                if($allpost->price_post==1){ //tipax
                                    $allpost->price_post = 0;
                                    $allpost->name_post='tipax';
                                }elseif ($allpost->price_post==3){ //peykmotori
                                    $payk=Tbldeliverprice::find()->where(['id'=>3])->one();
                                    $allpost->price_post = $payk->price;
                                    $allpost->name_post='payk';
                                }elseif($allpost->price_post==2){
                                    $post=Tbldeliverprice::find()->where(['id'=>2])->one();
                                    $allpost->price_post=$post->price;
                                    $allpost->name_post='post';

                                }
                                $allpost->id_user=Yii::$app->user->getId();
                                $allpost->down_buy=0;
                                $allpost->save();
                            }else{
                                $_SESSION['error_adres']="آدرس نمی تواند خالی باشد";
                                return $this->render('chenge', [
                                    'model' => $model,
                                    'fac'=>$fac,
                                ]);
                            }
                        }




                        $price=0;
                            $newbag->id_all_post = $allpost->id;

                            $pro=Tblproduct::find()->where(['id'=>$newbag->id_pro])->one();
                            $discount=Tbldiscount::find()->where(['all_pro'=>1])->one();
                            if($discount!=null){
                                $price+=$newbag->price-($newbag->price*$discount->price)/100;
                            }else{
                                $d=TbldisPro::find()->where(['id_cat_pro'=>$pro->id])->one();
                                if($d!=null){
                                    $di=Tbldiscount::find()->where(['id'=>$d->id_dis])->one();
                                    $price+=$newbag->price-($newbag->price*$di->price)/100;
                                }else{
                                    $price+=$newbag->price;
                                }
                            }

                        $newbag->save();


                        $all=Tblallpost::find()->where(['id'=>$allpost->id])->one();

                        if($all->name_post=='post'){
                            $all->price_post+=($newbag->count-1)*2000;
                            $all->price=$price+$all->price_post;
                            $all->update();
                        }elseif($all->name_post!='post'){
                            $all->price=$price+$all->price_post;
                            $all->update();
                        }

                        return $this->render('product');
                    }
                    

                }else{

                    $_SESSION['error7']='قیمت بالاتر است ';
                    return $this->render('chenge', [
                        'model' => $model,
                        'fac'=>$fac,
                        'allpost'=>$allpost,
                        'deliver'=>$deliver,
                    ]);
                }
                
            }else{
                return $this->render('chenge', [
                    'model' => $model,
                    'fac'=>$fac,
                ]);
            }
            return $this->redirect(['site/index']);
        } else {
            return $this->render('chenge', [
                'model' => $model,
                'fac'=>$fac,
            ]);
        }
    }


    /**
     * Creates a new TblbagReplace model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblbagReplace();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblbagReplace model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblbagReplace model.
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
     * Finds the TblbagReplace model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblbagReplace the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblbagReplace::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
