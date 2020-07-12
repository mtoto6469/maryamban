<?php

namespace backend\controllers;

use backend\models\TbldisPro;
use backend\models\Tblproduct;
use frontend\models\TblcategoryProduct;
use Yii;
use backend\models\Tbldiscount;
use backend\models\TbldiscountSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DiscountController implements the CRUD actions for Tbldiscount model.
 */
class DiscountController extends Controller
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
                'only' => ['index', 'delete','update','view','create','error'],
                'rules' => [

                    [
                        'actions' => ['index', 'delete','update','view','create'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],

                    [
                        'actions' => ['error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],

            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tbldiscount models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TbldiscountSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionFind()
    {
        $model = new Tblproduct();

        $query = $model->find()->where(['like', 'name', $_POST['product']])->andWhere(['enabel'=>1])->andWhere(['enabel_view'=>1])->all();
        $count = $model->find()->where(['like', 'name', $_POST['product']])->andWhere(['enabel'=>1])->andWhere(['enabel_view'=>1])->count();

        if($_POST['product']!=null) {

            if ($count >= 1) {

                $find = '';
                $find .= ' <div class="form-group field-tbldiscount-product_ress">';
                $find .= '<label class="control-label">نتیجه جستجو</label>';
                $find .= '<input name="Tbldiscount[product_ress]" value="" type="hidden"><div id="tbldiscount-product_ress">';
                for ($i = 0; $i < $count; $i = $i + 1) {
                    $find .= '<label><input name="Tbldiscount[product_res][]" value="';
                    $find .= $query[$i]->id;
                    $find .= '" type="checkbox">';
                    $find .= $query[$i]->name;
                    $find .= '</label>';
                }
                $find .= '</div><div class="help-block"></div></div>';
            } else {
                $find = '';
            }
        }else{
            $find = '';
        }
        return ($find);
    }

    /**
     * Displays a single Tbldiscount model.
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
     * Creates a new Tbldiscount model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tbldiscount();
       
        if ($model->load(Yii::$app->request->post()) ) {

            $count=Tbldiscount::find()->where(['all_pro'=>1])->andWhere(['enabel_view'=>1])->count();
            if($count>=1){

                $_SESSION['error1']='برای تمام محصولات درصد تخفیفی وجود دارد';
                return $this->render('create', [
                    'model' => $model,
                ]);

            }else{

                //  محصولاتی که شامل این تخفیف شده اند
//با ایجکس یافت شده است
                if($model->all_pro==0) {
                    if (isset($_POST['Tbldiscount']['product_res'])) {

                        if ($_POST['Tbldiscount']['product_res'] != null) {

                            foreach ($_POST['Tbldiscount']['product_res'] as $item) {

                                $modelp_d = new TbldisPro();

                                $modelp_d->id_cat_pro = $item;

                                $check = TbldisPro::find()->Where(['id_cat_pro' => $modelp_d->id_cat_pro])->count();
                                if ($check == 0) {
                                    $model->save();
                                    $modelp_d->id_dis = $model->id;

                                    $modelp_d->save();
                                }else{
                                    $_SESSION['error3']='برای این محصول تخفیفی در نظر گرفتید. شما قادر به انتخاب 2 تخفیف همزمان برای یک محصول نیستید';

                                    return $this->render('create', [
                                        'model' => $model,
                                    ]);
                                }

                            }
                        }
                    }
                }else{

                    $count=Tbldiscount::find()->where(['all_pro'=>1])->andWhere(['enabel_view'=>1])->count();
                    if($count>=1){

                        $_SESSION['error1']='برای تمام محصولات درصد تخفیفی وجود دارد';
                        return $this->render('create', [
                            'model' => $model,
                        ]);

                    }else{

                        $check=Tbldiscount::find()->Where(['enabel_view'=>1])->all();
                        if($check>=null){

                            foreach ($check as $c){
                                $dis=TbldisPro::find()->where(['id_dis'=>$c->id])->one();
                                $dis->enabel_view=0;
                                $c->enabel_view=0;
                                $c->save();
                                $dis->save();
                                $model->save();
                            }


                        }else{
                            $model->save();
                        }
                    }

                }
            }


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tbldiscount model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //  محصولاتی که شامل این تخفیف شده اند
//با ایجکس یافت شده است
            if($model->all_pro==0) {
                if (isset($_POST['Tbldiscount']['product_res'])) {

                    if ($_POST['Tbldiscount']['product_res'] != null) {

                        foreach ($_POST['Tbldiscount']['product_res'] as $item) {

                            $modelp_d = new TbldisPro();
                            $modelp_d->id_dis = $model->id;
                            $modelp_d->id_cat_pro = $item;
                            $check = TbldisPro::find()->where(['id_dis' => $modelp_d->id_dis])->andWhere(['id_cat_pro' => $modelp_d->id_cat_pro])->count();
                            if ($check == 0) {
                                $modelp_d->save();
                            }

                        }
                    }
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tbldiscount model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $pro_dis=TbldisPro::find()->where(['id_dis'=>$model->id])->all();
        if($pro_dis){
            foreach ($pro_dis as $pd){
                if($pd!=null){
                    $pd->enabel_view=0;
                    $pd->update();
                }
            }
        }

        $model->enabel_view=0;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tbldiscount model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tbldiscount the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tbldiscount::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
