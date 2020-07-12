<?php

namespace frontend\controllers;

use backend\models\Tbldeliverprice;
use backend\models\Tbldiscount;
use backend\models\TbldisPro;
use backend\models\Tblexist;
use common\components\jdf;
use frontend\models\Faceexist;
use frontend\models\Tblallpost;
use frontend\models\TblbagReplace;
use frontend\models\TblcategoryProduct;
use frontend\models\Tblcolor;
use frontend\models\Tblproduct;
use frontend\models\Tblprofile;
use frontend\models\Tblreplace;
use frontend\models\Tblsize;
use frontend\models\TblSodorFactor;
use frontend\models\Tblsubbag;
use Yii;
use frontend\models\Tblbag;
use frontend\models\TblbagSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BagController implements the CRUD actions for Tblbag model.
 */
class BagController extends Controller
{

    /**
     * @inheritdoc
     */
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [


            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','details','pack_details'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['details'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['pack_details'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],



                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tblbag models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblbagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblbag model.
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
     * Creates a new Tblbag model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblbag();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tblbag model.
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
     * Deletes an existing Tblbag model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $model->delete();
        return $this->redirect(['product']);
    }


    public function actionPro_color($id)
    {
        $cat_pro=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $brand=\frontend\models\Tblbrand::find()->where(['enabel_view'=>1])->all();
        $type=\frontend\models\TbltypeProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $color=Tblcolor::find()->where(['id_pro'=>$id])->all();
        $product=Tblproduct::find()->where(['id'=>$id])->one();
        return $this->render('pro_color', [
            'category' => $id,
            'cat_pro'=>$cat_pro,
            'type'=>$type,
            'brand'=>$brand,
            'color'=>$color,
            'product'=>$product,
        ]);
    }






    public function actionPack_color($id)
    {

        $cat_pro=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $brand=\frontend\models\Tblbrand::find()->where(['enabel_view'=>1])->all();
        $type=\frontend\models\TbltypeProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $color=Tblcolor::find()->where(['id_pro'=>$id])->all();
        $product=Tblproduct::find()->where(['id'=>$id])->one();
        return $this->render('pack_color', [
            'category' => $id,
            'cat_pro'=>$cat_pro,
            'type'=>$type,
            'brand'=>$brand,
            'color'=>$color,
            'product'=>$product,
        ]);
    }
    




    public function actionDetails($id,$color)
    {

        $cat_pro=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $brand=\frontend\models\Tblbrand::find()->where(['enabel_view'=>1])->all();
        $type=\frontend\models\TbltypeProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $product=Tblproduct::find()->where(['enabel_view'=>1])->andWhere(['id'=>$id])->one();
        $model= new Tblbag();
        $fac = TblSodorFactor::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['resive' => 1])->andWhere(['confirm' => 1])->all();
        $size=ArrayHelper::map(Tblsize::find()->where(['id_pro'=>$product->id])->andwhere(['enabel_view'=>1])->all(),'size','size');

        if($model->load(Yii::$app->request->post())){


            if(isset($_POST['btn'])) {

                if ($_POST['btn'] == 'bag') {

                    if ($model->size == null) {
                        $_SESSION['message_size'] = 'سایز نمی تواند خالی باشد';

                    } else {
                        
                    $model->id_user = Yii::$app->user->getId();
                    $model->id_pro = $id;
                    $data = new jdf();
                    $model->date_ir = $data->date('y/m/d');
                    $model->date = date('Y/m/d');
                    $model->id_fac = 0;
                    $model->down_buy = 0;
                    $model->color = $color;
                    $count_bag = $_POST['model_count'];
                    $model->count = $count_bag;
                    $role = Tblprofile::find()->where(['user_id' => Yii::$app->user->getId()])->one();
                    if ($role->role == 'user') {
                        $price = ($product->price * $count_bag);
                        $model->price = $price;
                    } else {
                        $price = ($product->price_namayande * $count_bag);
                        $model->price = $price;
                    }


                    if ($model->save()) {
                        $_SESSION['message'] = 'به سبد خرید اضافه شود';
                    } else {
                        echo $model->size;
                        var_dump($model->getErrors());
                        exit;
                    }
                    return $this->redirect(['details2', 'id' => $id, 'color' => $color,]);

                }
            }
                
                }


        }

        return $this->render('details', [
            'model'=>$model,
            'cat_pro'=>$cat_pro,
            'type'=>$type,
            'brand'=>$brand,
            'product'=>$product,
            'size'=>$size,
            'fac'=>$fac,
        ]);
    }
    public function actionDetails2($id,$color)
    {

        return $this->redirect(['details','id'=>$id,'color'=>$color,]);
    }



    public function actionPack_details($id,$color)
    {
//        session_start();
        $cat_pro=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $brand=\frontend\models\Tblbrand::find()->where(['enabel_view'=>1])->all();
        $type=\frontend\models\TbltypeProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $product=Tblproduct::find()->where(['enabel_view'=>1])->andWhere(['id'=>$id])->one();
        $model= new Tblbag();
        $modelc= new TblbagReplace();
        $size=ArrayHelper::map(Tblsize::find()->where(['id_pro'=>$product->id])->andwhere(['enabel_view'=>1])->all(),'size','size');
        $fac = TblSodorFactor::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['resive' => 1])->andWhere(['confirm' => 1])->all();

        if(Yii::$app->request->post() ){
            if(isset($_POST['btn'])){
                if($_POST['btn']=='bag'){

                    $model->id_user=Yii::$app->user->getId();
                    $model->id_pro=$id;
                    if($model->size==null){
                        $model->size=0;
                    }
                    $data = new jdf();
                    $model->date_ir = $data->date('y/m/d');
                    $model->date=date('Y/m/d');
                    $model->id_fac=0;
                    $model->down_buy=0;
                    $model->color=$color;
                    $count_bag=$_POST['model_count'];
                    $model->count=$count_bag;
                    $count=Tblsize::find()->where(['id_pro'=>$product->id])->andwhere(['enabel_view'=>1])->count();
                    if($product->pak!=null){
                        $price=($product->price_namayande * $count)-$product->pak;

                    }else{
                        $price=$product->price_namayande * $count;
                    }

                    $model->price=($price* $count_bag);
                    ;
                    if($model->save()){

                        $_SESSION['message']='به سبد خرید اضافه شد';
                    }
                    return $this->redirect(['pack_details2','id'=>$id,'color'=>$color,]);


                }
            }

        }

        return $this->render('pack_details', [
            'model'=>$model,
            'cat_pro'=>$cat_pro,
            'type'=>$type,
            'brand'=>$brand,
            'product'=>$product,
            'size'=>$size,
            'fac'=>$fac ,
        ]);
    }
    public function actionPack_details2($id,$color)
    {

        return $this->redirect(['pack_details','id'=>$id,'color'=>$color,]);
    }



    public function actionProduct(){

       $deliver=ArrayHelper::map(Tbldeliverprice::find()->all(),'id','name');
       $allpost=new Tblallpost();
        $bag=Tblbag::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->andWhere(['id_all_post'=>null])->all();
        if($bag==null){
            return $this->redirect(['update_addres']);

        }else {
            if (Yii::$app->request->post() && $allpost->load(Yii::$app->request->post())) {


                if(isset($_POST['all'])) {
                    if ($_POST['all'] == 0) {

                          if(isset($_POST['adres'])){
                        if($_POST['adres']!=null){
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
                                return $this->render('product',[
                                        'bag' => $bag,
                                        'allpost' => $allpost,
                                        'deliver'=>$deliver,
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
                                  return $this->render('product',[
                                      'bag' => $bag,
                                      'allpost' => $allpost,
                                      'deliver'=>$deliver,

                                  ]);
                              }
                    }


                        $count=0;
                        $price=0;
                        foreach ($bag as $b) {
                            $b->id_all_post = $allpost->id;
                            $count+=$b->count;
                            $pro=Tblproduct::find()->where(['id'=>$b->id_pro])->one();
                            $discount=Tbldiscount::find()->where(['all_pro'=>1])->andWhere(['enabel_view'=>1])->one();
                            if($discount!=null){
                                $price+=$b->price-($b->price*$discount->price)/100;
                                $b->id_discount=$discount->id;
                            }else{
                                $d=TbldisPro::find()->where(['id_cat_pro'=>$pro->id])->andWhere(['enabel_view'=>1])->one();
                                if($d!=null){
                                    $di=Tbldiscount::find()->where(['id'=>$d->id_dis])->andWhere(['enabel_view'=>1])->one();
                                    $price+=$b->price-($b->price*$di->price)/100;
                                    $b->id_discount=$di->id;
                                }else{
                                    $price+=$b->price;
                                }
                            }
                            
                            $b->save();

                        }
                        $all=Tblallpost::find()->where(['id'=>$allpost->id])->one();

                        if($all->name_post=='post'){
                             $all->price_post+=($count-1)*2000;
                            $all->price=$price+$all->price_post;
                            $all->update();
                        }elseif($all->name_post!='post'){
                            $all->price=$price+$all->price_post;
                            $all->update();
                        }

                        return $this->redirect(['update_addres']);

                    } else {



                        if(isset($_POST['adres'])){
                            if($_POST['adres']!=null){
                                $allpost->id_fader=$_POST['adres'];
                                $old=Tblallpost::find()->where(['id'=>$_POST['adres']])->one();
                                $allpost->address=$old->address;
                                $allpost->costomer=$old->costomer;
                                $allpost->tel=$old->tel;
                                if($allpost->price_post==1){ //tipax
                                    $allpost->price_post = 0;
                                    $allpost->name_post='tipax';
                                }elseif ($allpost->price_post==3){ //peykmotori
                                    $allpost->price_post =0;
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
                                    $allpost->id_fader=0;
                                    if($allpost->price_post==1){ //tipax
                                        $allpost->price_post = 0;
                                        $allpost->name_post='tipax';
                                    }elseif ($allpost->price_post==3){ //peykmotori
                                        $payk=Tbldeliverprice::find()->where(['id'=>3])->one();
                                        $allpost->price_post =$payk->price;
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
                                    return $this->render('product',[
                                        'bag' => $bag,
                                        'allpost' => $allpost,
                                        'deliver'=>$deliver,

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
                                return $this->render('product',[
                                    'bag' => $bag,
                                    'allpost' => $allpost,
                                    'deliver'=>$deliver,

                                ]);
                            }
                        }


                        $bag = Tblbag::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->all();
                       $count=0;
                        $price=0;
                        foreach ($bag as $b) {

                            if (isset($_POST['sub'][$b->id])) {
                                if ($_POST['sub'][$b->id] == 1) {
                                    $b->id_all_post = $allpost->id;;
                                    $count+=$b->count;
                                    $pro=Tblproduct::find()->where(['id'=>$b->id_pro])->one();
                                    $discount=Tbldiscount::find()->where(['all_pro'=>1])->andWhere(['enabel_view'=>1])->one();
                                    if($discount!=null){
                                        $price+=$b->price-($b->price*$discount->price)/100;
                                        $b->id_discount=$discount->id;
                                    }else{
                                        $d=TbldisPro::find()->where(['id_cat_pro'=>$pro->id])->andWhere(['enabel_view'=>1])->one();
                                        if($d!=null){
                                            $di=Tbldiscount::find()->where(['id'=>$d->id_dis])->andWhere(['enabel_view'=>1])->one();
                                            $price+=$b->price-($b->price*$di->price)/100;
                                            $b->id_discount=$di->id;
                                        }else{
                                            $price+=$b->price;
                                        }
                                    }
                                    $b->save();
                                }

                            }

                        }
                        $all=Tblallpost::find()->where(['id'=>$allpost->id])->one();
                        if($all->name_post=='post' ){
                            $all->price_post+=($count-1)*2000;
                            $all->price=$price+$all->price_post;
                            $all->update();
                        }elseif($all->name_post!='post'){
                            $all->price=$price+$all->price_post;
                            $all->update();
                        }

                        return $this->redirect(['addres',
                            'id' => $allpost->id,

                        ]);

                    }
                }
                else {



                    if(isset($_POST['adres'])){
                        if($_POST['adres']!=null){
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
                                $allpost->id_fader=0;
                                if($allpost->price_post==1){ //tipax
                                    $allpost->price_post = 0;
                                    $allpost->name_post='tipax';
                                }elseif ($allpost->price_post==3){ //peykmotori
                                    $payk=Tbldeliverprice::find()->where(['id'=>3])->one();
                                    $allpost->price_post = $payk->price;
                                    $allpost->name_post='peyk';
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
                                return $this->render('product',[
                                    'bag' => $bag,
                                    'allpost' => $allpost,
                                    'deliver'=>$deliver,

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
                            return $this->render('product',[
                                'bag' => $bag,
                                'allpost' => $allpost,
                                'deliver'=>$deliver,

                            ]);
                        }
                    }



                    $bag = Tblbag::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->all();
                    $count=0;
                    $price=0;
                    foreach ($bag as $b) {

                        if (isset($_POST['sub'][$b->id])) {
                            if ($_POST['sub'][$b->id] == 1) {
                                $b->id_all_post = $allpost->id;;
                                $count+=$b->count;
                                $pro=Tblproduct::find()->where(['id'=>$b->id_pro])->one();
                                $discount=Tbldiscount::find()->where(['all_pro'=>1])->andWhere(['enabel_view'=>1])->one();
                                if($discount!=null){
                                    $price+=$b->price-($b->price*$discount->price)/100;
                                    $b->id_discount=$discount->id;
                                }else{
                                    $d=TbldisPro::find()->where(['id_cat_pro'=>$pro->id])->andWhere(['enabel_view'=>1])->one();
                                    if($d!=null){
                                        $di=Tbldiscount::find()->where(['id'=>$d->id_dis])->andWhere(['enabel_view'=>1])->one();
                                        $price+=$b->price-($b->price*$di->price)/100;
                                        $b->id_discount=$di->id;
                                    }else{
                                        $price+=$b->price;
                                    }
                                }
                                $b->save();
                            }

                        }

                    }
                    $all=Tblallpost::find()->where(['id'=>$allpost->id])->one();
                    if($all->name_post=='post' ){
                        $all->price_post+=($count-1)*2000;
                        $all->price=$price+$all->price_post;
                        $all->update();
                    }elseif($all->name_post!='post'){
                        $all->price=$price+$all->price_post;
                        $all->update();
                    }

                    return $this->redirect(['product',
                        'id' => $allpost->id,

                    ]);

                }

            } else {
                return $this->render('product', [
                    'bag' => $bag,
                    'allpost' => $allpost,
                    'deliver'=>$deliver,

                ]);
            }
        }

    }

//
//    public function actionAddres($id){
//        $allpost=Tblallpost::find()->where(['id'=>$id])->one();
//        $sub=Tblbag::find()->where(['id_all_post'=>$id])->all();
//        if( $allpost->load(Yii::$app->request->post())) {
//
//            $allpost->update();
//            $countbag=Tblbag::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->andWhere(['id_all_post'=>null])->count();
//
//if($countbag>=1){
//
//    return $this->redirect(['product']);
//
//}else{
//    return $this->redirect(['update_addres']);
//}
//
//        }else{
//            return $this->render('addres',[
//                'allpost'=>$allpost,
//                'sub'=>$sub,
//
//            ]);
//        }
//
//
//    }


    public function actionUpdate_addres(){
        
        $model=new TblSodorFactor();
        $allpost=Tblallpost::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->all();
        $bag=Tblbag::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->all();
        $countallpost=Tblallpost::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->count();

        foreach ($allpost as $all){

                if($all->category==null){
                    for ($i=1 ;$i<=$countallpost ; $i++){
                      $check=Tblallpost::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->andWhere(['category'=>$i])->count();
                      if($check==0){
                          $all->category=$i;
                          $all->update();
                          break;
                      }
                }
            }
        }

//        $price_fac=0;
//        foreach ($bag as $b1){
//            $price_fac+=$b1->price;
//        }



        if( Yii::$app->request->post()) {

        


            if($_POST['don']=='پرداخت آنلاین'){

                return $this->redirect(['pardakht',
                    
                ]);

            }elseif($_POST['don']=='پرداخت نقدی'){
                return $this->redirect(['pardakht/create']);

            }elseif($_POST['don']=='پرداخت اعتباری '){

                return $this->redirect(['pardakht/credit']);
            }

        }
        

        return $this->render('addres1',[
            'model'=>$model,
            'bag'=>$bag,
            'allpost'=>$allpost,

        ]);

    }


    public function actionDelete_sub($id)
    {
        $bag=Tblbag::find()->where(['id'=>$id])->one();

//
        $allpost=Tblallpost::find()->where(['id'=>$bag->id_all_post])->one();

        $newsub=Tblbag::find()->where(['id_all_post'=>$allpost->id])->andFilterWhere(['!=','id',$id])->all();
        if($newsub==null){
            $allpost->delete();
            $bag->id_all_post=null;
            $bag->update();
            return $this->redirect(['product']);
        }else{

            $bag->id_all_post=null;
            $bag->update();
            return $this->render('addres',[
                'allpost'=>$allpost,
                'sub'=>$newsub,

            ]);
        }

    }


    public function actionDelete_addres($id){

        $bag=Tblbag::find()->where(['id'=>$id])->one();

        $allpost=Tblallpost::find()->where(['id'=>$bag->id_all_post])->one();
        $price=$bag->price;
        $newsub=Tblbag::find()->where(['id_all_post'=>$allpost->id])->andFilterWhere(['!=','id',$id])->all();
        if($newsub==null){

            $allpost->delete();
            $bag->id_all_post=null;
            $bag->update();
            return $this->redirect(['product']);
        }else{
            if($allpost->name_post=='post') {
                $allpost->price_post= $allpost->price_post-2000;
                $allpost->price=$allpost->price-2000;

            }
            $allpost->price=$allpost->price-$price;
            $allpost->save();

            $bag->id_all_post=null;
            $bag->update();
            return $this->redirect(['product']);
        }

    }





//
//
//    public function actionProduct2()
//    {
//        $bag=Tblbag::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->all();
//        $model= new TblSodorFactor();
//        if($model->load(Yii::$app->request->post()) ){
//            $model->id_user=1;
//            $model->data=date('y:m:d');
//            $data_ir=new jdf();
//            $model->data_ir=$data_ir->date('y/m/d');
//            $model->save();
//            return $this->redirect(['pardakht','id'=>$model->id]);
//        }
//
//        return $this->render('product',[
//            'model'=>$model,
//            'bag'=>$bag
//        ]);
//    }




  public function actionPardakht()
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

        }
        else {

// محاسبه قیمت فاکتور


            $all = Tblallpost::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->all();
            $price_fac = 0;
            foreach ($all as $a) {
                $price_fac += $a->price;
            }


                $model = new TblSodorFactor();
                $date = new jdf();
                $model->id_user = Yii::$app->user->getId();
                $model->data = date('Y/m/d');
                $model->data_ir = $date->date('Y/m/d');
                $model->price = $price_fac;
                $model->save();


//$model->confirm =0;
//            $model->save();
//                foreach ($bag as $b) {
//                    $b->id_fac = $model->id;
//                    $b->down_buy = 1;
//                    $b->update();
//                    $p = Tblproduct::find()->where(['id' => $b->id_pro])->one();
//                    $ex = Tblexist::find()->where(['id_pro' => $p->id])->andWhere(['size' => $b->size])->andWhere(['color' => $b->color])->one();
//                    if ($ex) {
//                        $ex->exist = $ex->exist - $b->count;
//                        $ex->save();
//                    }
//                    $allpost = Tblallpost::find()->where(['id' => $b->id_all_post])->all();
//                    foreach ($allpost as $all) {
//                        if ($all->id_fac == null) {
//                            $all->id_fac = $model->id;
//                            $all->down_buy = 1;
//                            $all->update();
//                        }
//
//                    }
//
//                }
            
            return $this->render('pardakht',[
                'id'=>$model->id,
            ]);


        }


    }



    public function actionCall()
    {
        $request = \Yii::$app->request;
        $orderId = $request->get('order_id');

        $orderId = (int) $_GET['order_id'];

        $api = "1M7LX" ;
        $amount = 100 ; //Tooman
        $client = new SoapClient("http://pardano.com/p/webservice/?wsdl");
        $result = $client->verification($api,$amount,$request->get('au'));

        return $this->render('call',[
            'order_id'=>$orderId,
            'result'=>$result,

        ]);
    }
    
    
    
    public function actionFind()
    {
        $model = new \frontend\models\Tblexist();

        $query = $model->find()->where(['id_pro'=>$_GET['name']])->andWhere(['size'=>$_GET['size']])
            ->andWhere(['color'=>$_GET['color']])->andWhere(['enabel_view'=>1])->one();

        $count =$model->find()->where(['id_pro'=>$_GET['name']])->andWhere(['size'=>$_GET['size']])
            ->andWhere(['enabel_view'=>1])->andWhere(['color'=>$_GET['color']])->count();
            if($count>=1){
                if($query->exist>=1){

                    return '<p style="color:green"> موجود</p>'.$_GET["date"].' تاریخ تحویل ';

                }else{
                    return '<p style="color:red"> موجود نیست</p>';
                }

            }else{
                return '<p style="color:red"> موجود نیست</p>';

            }


    }




    public function actionFindpack()
    {
        $model = new \frontend\models\Tblexist();

        $query = $model->find()->where(['id_pro'=>$_GET['name']])->andWhere(['size'=>0])
            ->andWhere(['color'=>$_GET['color']])->andWhere(['enabel_view'=>1])->one();

        $count =$model->find()->where(['id_pro'=>$_GET['name']])->andWhere(['size'=>0])
            ->andWhere(['enabel_view'=>1])->andWhere(['color'=>$_GET['color']])->count();

        if($count>=1){
            if($query->exist>=1){

                return '<p style="color:green"> موجود</p>'.$_GET["date"].' تاریخ تحویل ';

            }else{
                return '<p style="color:red"> موجود نیست</p>';
            }

        }else{
            return '<p style="color:red"> موجود نیست</p>';

        }


    }




    /**
     * Finds the Tblbag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblbag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblbag::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
