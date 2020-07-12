<?php

namespace frontend\controllers;

use backend\models\TbldisPro;
use common\components\jdf;
use frontend\models\Faceexist;
use frontend\models\Tblallpost;
use frontend\models\Tblbag;
use frontend\models\Tblexist;
use frontend\models\Tblproduct;
use frontend\models\TblSodorFactor;
use Yii;
use frontend\models\Tblpardakht;
use frontend\models\TblpardakhtSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PardakhtController implements the CRUD actions for Tblpardakht model.
 */
class PardakhtController extends Controller
{
    /**
     * @inheritdoc
     */
    public $layout = 'pardakht.php';

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
     * Lists all Tblpardakht models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblpardakhtSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblpardakht model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionView2($id)
    {
        $this->layout = 'profile.php';
        return $this->render('view2', [
            'model' => $this->findModel($id),
        ]);
    }






    public function actionAdd()
    {
        $modelp = new Tblpardakht();


        if ($modelp->load(Yii::$app->request->post())) {


            if (isset($_POST['date'])) {
                $modelp->date = $_POST['date'];
                $modelp->id_user=Yii::$app->user->getId();
                $modelp->approve=0;
                $modelp->id_fac=0;
                $modelp->save();

            } else {
                $_SESSION['error'] = 'تاریخ و ساعت پرداخت نمی‌تواند خالی باشد';
                return $this->render('create', [
                    'modelp' => $modelp,
                ]);
            }

            return $this->redirect(['view', 'id' => $modelp->id]);

        } else {
            return $this->render('create', [
                'modelp' => $modelp,
            ]);
        }
    }










    /**
     * Creates a new Tblpardakht model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelp = new Tblpardakht();


        $allpost = Tblallpost::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->all();
        $bag = Tblbag::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->all();
        $countbag = Tblbag::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->count();

        if ($allpost == null) {
            return $this->redirect(['bag/product']);
        }


        foreach ($bag as $b) {

            $p = Tblproduct::find()->where(['id' => $b->id_pro])->one();
            $ex = Tblexist::find()->where(['id_pro' => $p->id])->andWhere(['size' => $b->size])->andWhere(['color' => $b->color])->one();
            if ($ex) {
                $face = Faceexist::find()->where(['id_user' => Yii::$app->user->getId()])
                    ->andWhere(['id_exist' => $ex->id])->one();
                if ($face == null) {

                    $modelface = new Faceexist();
                    $modelface->id_user = Yii::$app->user->getId();
                    $modelface->id_exist = $ex->id;
                    $modelface->exist = $ex->exist;
                    $modelface->save();

                } else {
                    $face->exist = $ex->exist;
                    $face->save();
                }

            }
        }


//            چک کردن موجودی


        $price_fac = 0;
        foreach ($bag as $b) {

            $p = Tblproduct::find()->where(['id' => $b->id_pro])->one();
            $ex = Tblexist::find()->where(['id_pro' => $p->id])->andWhere(['size' => $b->size])->andWhere(['color' => $b->color])->one();
            if ($ex) {
                $face = Faceexist::find()->where(['id_user' => Yii::$app->user->getId()])
                    ->andWhere(['id_exist' => $ex->id])->one();
                if ($face->exist >= $b->count) {
                    $face->exist = $face->exist - $b->count;
                    $face->save();
                    $dis = TbldisPro::find()->where(['id_cat_pro' => $p->id_category])->one();

//                    $price_fac += $b->price;

                } else {

                    $_SESSION['error2'] = 'محصولاتی که موجودی شان تمام شده از سبد خرید شما حذف شده است ';

                    $p = Tblproduct::find()->where(['id' => $b->id_pro])->one();
                    $ex = Tblexist::find()->where(['id_pro' => $p->id])->andWhere(['size' => $b->size])->andWhere(['color' => $b->color])->one();
                    if ($ex) {
                        $face = Faceexist::find()->where(['id_user' => Yii::$app->user->getId()])
                            ->andWhere(['id_exist' => $ex->id])->one();
                        if ($face != null) {
                            $face->exist = $ex->exist;
                            $face->save();
                        }
                    }


                    $allpost = Tblallpost::find()->where(['id' => $b->id_all_post])->one();

                    $newsub = Tblbag::find()->where(['id_all_post' => $allpost->id])->andFilterWhere(['!=', 'id', $b->id])->all();
                    if ($newsub == null) {
                        $allpost->delete();
                        $b->delete();

                    } else {
                        $b->delete();
                       
                    }

                }

            }else {

                $_SESSION['error2'] = 'محصولاتی که موجودی شان تمام شده از سبد خرید شما حذف شده است ';

                $allpost = Tblallpost::find()->where(['id' => $b->id_all_post])->one();

                $newsub = Tblbag::find()->where(['id_all_post' => $allpost->id])->andFilterWhere(['!=', 'id', $b->id])->all();
                if ($newsub == null) {
                    $allpost->delete();
                    $b->delete();

                } else {
                    $b->delete();

                }
            }

        }
        $newcount = Tblbag::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->count();
        if ($newcount != $countbag) {
            $deletfac = Faceexist::find()->where(['id_user' => Yii::$app->user->getId()])->all();
            foreach ($deletfac as $df) {
                $df->delete();
            }
            
             
        $allpost2 = Tblallpost::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->all();
        $price2=0;
         $count=0;
        foreach($allpost2 as $all2){
            $bag2=Tblbag::find()->where(['id_all_post'=>$all2->id])->all();
            foreach($bag2 as $b){
                 $count+=$b->count;
                 if($b->id_discount!=null){
                      $di=Tbldiscount::find()->where(['id'=>$b->id_discount])->andWhere(['enabel_view'=>1])->one();
                      $price+=$b->price-($b->price*$di->price)/100;
                 }else{
                     $price+=$b->price; 
                 }
                            
            }
            
            if($all2->name_post=='post'){
                             $all2->price_post+=($count-1)*2000;
                            $all2->price=$price+$all2->price_post;
                            $all2->update();
                        }elseif($all2->name_post!='post'){
                            $all2->price=$price+$all2->price_post;
                            $all2->update();
                        }
            
        }
        
            
            
            return $this->redirect(['bag/product']);

        }
        
        
        
       
        
        
        
        

        if ($modelp->load(Yii::$app->request->post())) {
            $model = new TblSodorFactor();
            $date = new jdf();
            $model->id_user = Yii::$app->user->getId();
            $model->data = date('Y/m/d');
            $model->data_ir = $date->date('Y/m/d');

            $all = Tblallpost::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->all();
            $price_fac = 0;
            foreach ($all as $a) {
                $price_fac += $a->price;
            }
            $model->price = $price_fac;


            $model->save();
            if (isset($_POST['date'])) {
                $modelp->date = $_POST['date'];
                $modelp->id_fac = $model->id;
                $modelp->id_user=Yii::$app->user->getId();
                $modelp->approve=0;
                $modelp->save();

                foreach ($bag as $b) {
                    $b->id_fac = $model->id;
                    $b->down_buy = 1;
                    $b->update();
                    $p = Tblproduct::find()->where(['id' => $b->id_pro])->one();
                    $ex = Tblexist::find()->where(['id_pro' => $p->id])->andWhere(['size' => $b->size])->andWhere(['color' => $b->color])->one();
                    if ($ex) {
                        $ex->exist = $ex->exist - $b->count;
                        $ex->save();
                    }
                    $allpost = Tblallpost::find()->where(['id' => $b->id_all_post])->all();
                    foreach ($allpost as $all) {
                        if ($all->id_fac == null) {
                            $all->id_fac = $model->id;
                            $all->down_buy = 1;
                            $all->update();
                        }

                    }

                }
            } else {
                $_SESSION['error'] = 'تاریخ و ساعت پرداخت نمی‌تواند خالی باشد';
                return $this->render('create', [
                    'modelp' => $modelp,
                ]);
            }

            return $this->redirect(['view', 'id' => $modelp->id]);

        } else {
            return $this->render('create', [
                'modelp' => $modelp,
            ]);
        }

    }


    public function actionCredit()
    {

        $allpost = Tblallpost::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->all();
        $bag = Tblbag::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->all();
        $countbag = Tblbag::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->count();

        if ($allpost == null) {
            return $this->redirect(['bag/product']);
        }


        foreach ($bag as $b) {

            $p = Tblproduct::find()->where(['id' => $b->id_pro])->one();

            $ex = Tblexist::find()->where(['id_pro' => $p->id])->andWhere(['size' => $b->size])->andWhere(['color' => $b->color])->one();

            if ($ex) {

                $face = Faceexist::find()->where(['id_user' => Yii::$app->user->getId()])
                    ->andWhere(['id_exist' => $ex->id])->one();
                if ($face == null) {

                    $modelface = new Faceexist();
                    $modelface->id_user = Yii::$app->user->getId();
                    $modelface->id_exist = $ex->id;
                    $modelface->exist = $ex->exist;
                    $modelface->save();

                } else {
                    $face->exist = $ex->exist;
                    $face->save();
                }

            }
        }


//            چک کردن موجودی


        $price_fac = 0;
        foreach ($bag as $b) {

            $p = Tblproduct::find()->where(['id' => $b->id_pro])->one();
            $ex = Tblexist::find()->where(['id_pro' => $p->id])->andWhere(['size' => $b->size])->andWhere(['color' => $b->color])->one();
            if ($ex) {
                $face = Faceexist::find()->where(['id_user' => Yii::$app->user->getId()])
                    ->andWhere(['id_exist' => $ex->id])->one();
                if ($face->exist >= $b->count) {
                    $face->exist = $face->exist - $b->count;
                    $face->save();
                    $dis = TbldisPro::find()->where(['id_cat_pro' => $p->id_category])->one();

//                    $price_fac += $b->price;

                } else {

                    $_SESSION['error2'] = 'محصولاتی که موجودی شان تمام شده از سبد خرید شما حذف شده است ';

                    $p = Tblproduct::find()->where(['id' => $b->id_pro])->one();
                    $ex = Tblexist::find()->where(['id_pro' => $p->id])->andWhere(['size' => $b->size])->andWhere(['color' => $b->color])->one();
                    if ($ex) {
                        $face = Faceexist::find()->where(['id_user' => Yii::$app->user->getId()])
                            ->andWhere(['id_exist' => $ex->id])->one();
                        if ($face != null) {
                            $face->exist = $ex->exist;
                            $face->save();
                        }
                    }


                    $allpost = Tblallpost::find()->where(['id' => $b->id_all_post])->one();

                    $newsub = Tblbag::find()->where(['id_all_post' => $allpost->id])->andFilterWhere(['!=', 'id', $b->id])->all();
                    if ($newsub == null) {
                        $allpost->delete();
                        $b->delete();

                    } else {
                        $b->delete();

                    }

                }
                
                
    
            }else {

                $_SESSION['error2'] = 'محصولاتی که موجودی شان تمام شده از سبد خرید شما حذف شده است ';

                $allpost = Tblallpost::find()->where(['id' => $b->id_all_post])->one();

                $newsub = Tblbag::find()->where(['id_all_post' => $allpost->id])->andFilterWhere(['!=', 'id', $b->id])->all();
                if ($newsub == null) {
                    $allpost->delete();
                    $b->delete();

                } else {
                    $b->delete();

                }
            }
        }
        $newcount = Tblbag::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->count();
        if ($newcount != $countbag) {
            $deletfac = Faceexist::find()->where(['id_user' => Yii::$app->user->getId()])->all();
            foreach ($deletfac as $df) {
                $df->delete();
            }
             $allpost2 = Tblallpost::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->all();
        $price2=0;
         $count=0;
        foreach($allpost2 as $all2){
            $bag2=Tblbag::find()->where(['id_all_post'=>$all2->id])->all();
            foreach($bag2 as $b){
            
                 $count+=$b->count;
                 if($b->id_discount!=null){
                      $di=Tbldiscount::find()->where(['id'=>$b->id_discount])->andWhere(['enabel_view'=>1])->one();
                      $price+=$b->price-($b->price*$di->price)/100;
                 }else{
                     $price+=$b->price; 
                 }
                            
            }
            
            if($all2->name_post=='post'){
                             $all2->price_post+=($count-1)*2000;
                            $all2->price=$price+$all2->price_post;
                            $all2->update();
                        }elseif($all2->name_post!='post'){
                            $all2->price=$price+$all2->price_post;
                            $all2->update();
                        }
            
        }
        
            return $this->redirect(['bag/product']);

        } else {
            
    

// محاسبه قیمت فاکتور


            $all = Tblallpost::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->all();
            $price_fac = 0;
            foreach ($all as $a) {
                $price_fac += $a->price;
            }


            $profile = \frontend\models\Tblprofile::find()->where(['user_id' => Yii::$app->user->getId()])->one();

            if ($profile->mande <= $price_fac) {
                return $this->redirect(['error']);
            } else {

                $profile->mande = $profile->mande - $price_fac;
                $profile->save();


                $model = new TblSodorFactor();
                $date = new jdf();
                $model->id_user = Yii::$app->user->getId();
                $model->data = date('Y/m/d');
                $model->data_ir = $date->date('Y/m/d');
                $model->price = $price_fac;
                $model->confirm = 1;
                $model->save();

                foreach ($bag as $b) {
                    $b->id_fac = $model->id;
                    $b->down_buy = 1;
                    $b->update();
                    $p = Tblproduct::find()->where(['id' => $b->id_pro])->one();
                    $ex = Tblexist::find()->where(['id_pro' => $p->id])->andWhere(['size' => $b->size])->andWhere(['color' => $b->color])->one();
                    if ($ex) {
                        $ex->exist = $ex->exist - $b->count;
                        $ex->save();
                    }
                    $allpost = Tblallpost::find()->where(['id' => $b->id_all_post])->all();
                    foreach ($allpost as $all) {
                        if ($all->id_fac == null) {
                            $all->id_fac = $model->id;
                            $all->down_buy = 1;
                            $all->update();
                        }

                    }

                }
            return $this->redirect(['bag/product']);

            }


        }


    }

    
    
    
    
    
    
    
    
    public function actionError()
    {
        $this->layout='main.php';
        return $this->render('error');
    }






    /**
     * Updates an existing Tblpardakht model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public
    function actionUpdate($id)
    {
        $modelp = $this->findModel($id);

        if ($modelp->load(Yii::$app->request->post())) {
            if (isset($_POST['date'])) {
                $modelp->date = $_POST['date'];
                $modelp->save();

            } else {
                $_SESSION['error'] = 'تاریخ و ساعت پرداخت نمی‌تواند خالی باشد';
                return $this->render('create', [
                    'modelp' => $modelp,
                ]);
            }

            return $this->redirect(['view2', 'id' => $modelp->id]);
        } else {
            return $this->render('update', [
                'modelp' => $modelp,
            ]);
        }
    }

    /**
     * Deletes an existing Tblpardakht model.
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
     * Finds the Tblpardakht model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblpardakht the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel($id)
    {
        if (($model = Tblpardakht::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
