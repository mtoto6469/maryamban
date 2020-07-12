<?php

namespace backend\controllers;

use backend\models\Tblcolor;
use backend\models\Tblproduct;
use backend\models\Tblsize;
use Yii;
use backend\models\Tblexist;
use backend\models\TblexistSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExistController implements the CRUD actions for Tblexist model.
 */
class ExistController extends Controller
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
     * Lists all Tblexist models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblexistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblexist model.
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
     * Creates a new Tblexist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblexist();

        
        $name_pro=ArrayHelper::map(Tblproduct::find()->where(['enabel_view'=>1])->all(),'id','name');


        if ($model->load(Yii::$app->request->post()) ) {

            if(
                $_POST['Tblexist']['color']!=null &&
            $_POST['Tblexist']['size']!=null && 
            isset($_POST['Tblexist']['color']) &&
            isset($_POST['Tblexist']['size'])
            )
            {
                 if($_POST['Tblexist']['size']==0){
                $model->size=0;
            }else{
                $model->size=$_POST['Tblexist']['size'];
            }
            $model->color=$_POST['Tblexist']['color'];
            $check=Tblexist::find()->where(['id_pro'=>$model->id_pro])->andWhere(['color'=>$model->color])->andWhere(['size'=>$model->size])->one();
            
            if($check==null){
                $model->save();
            }else{
                $_SESSION['error8']='محصولی با این مشخصات قبلا وارد شده است';
                return $this->render('create', [
                    'model' => $model,
                    'name_pro'=>$name_pro,

                ]);
            }
            

            return $this->redirect(['view', 'id' => $model->id]);
               
            }else{
                 $_SESSION['error8']='اطلاعات ارسالی درست نمیباشد لطفا سایز و رنگ بندی را مشخص کنید';
                return $this->render('create', [
                    'model' => $model,
                    'name_pro'=>$name_pro,

                ]);
            }

           
        } else {
            return $this->render('create', [
                'model' => $model,
                'name_pro'=>$name_pro,

            ]);
        }
    }

    /**
     * Updates an existing Tblexist model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $name_pro=ArrayHelper::map(Tblproduct::find()->all(),'id','name');

        if ($model->load(Yii::$app->request->post())) {


//            if($_POST['Tblexist']['size']==0){
//                $model->size=0;
//            }else{
//                $model->size=$_POST['Tblexist']['size'];
//            }
//            $model->color=$_POST['Tblexist']['color'];
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'name_pro'=>$name_pro,

            ]);
        }
    }




    public function actionFind(){
        $model = new  Tblproduct();
        

        $query = $model->find()->where([ 'id'=>$_POST['name']])->andWhere(['enabel_view'=>1])->all();
        $count = $model->find()->where([ 'id'=>$_POST['name']])->andWhere(['enabel_view'=>1])->count();


        if ($count>=1){
            $find = '';

            $find.='<div class="form-group field-tblexist-size required has-error">';
            $find.='<label class="control-label" for="tblexist-size">Size</label>';
            $find.='<select id="tblexist-size" class="form-control" name="Tblexist[size]" aria-required="true" aria-invalid="true">';
            $find.='<option value="">انتخاب کنید</option>';
            $find.='<option value="0">پک کامل</option>';
            for ($i = 0; $i < $count; $i = $i + 1) {
                $size=Tblsize::find()->where(['id_pro'=>$query[$i]])->andWhere(['enabel_view'=>1])->all();
                foreach ($size as $s){
                $find.='<option value="'.$s->size.'">'.$s->size.'</option>';

                }

            }
            $find.='</select>';
            $find.='<div class="help-block">Size نمی‌تواند خالی باشد.</div>';
            $find.=' </div>';







          $find.='<div class="form-group field-tblexist-color required">';
          $find.='<label class="control-label" for="tblexist-color">Color</label>';
          $find.='<select id="tblexist-color" class="form-control" name="Tblexist[color]" aria-required="true">';
          $find.='<option value="">انتخاب کنید</option>';
            for ($i = 0; $i < $count; $i = $i + 1) {
                $color=Tblcolor::find()->where(['id_pro'=>$query[$i]])->andWhere(['enabel_view'=>1])->all();
                foreach ($color as $c){
                    $find.='<option value="'.$c->color.'">'.$c->color.'</option>';

                }

            }


          $find.='</select>';
          $find.='<div class="help-block"></div>';
            $find.='</div>';



            }

        return $find;


    }
    

    /**
     * Deletes an existing Tblexist model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
       $model= $this->findModel($id);
        $model->enabel_view=0;
        
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tblexist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblexist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblexist::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
