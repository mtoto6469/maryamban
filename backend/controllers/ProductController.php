<?php

namespace backend\controllers;

use backend\models\Tblbrand;
use backend\models\TblcategoryProduct;
use backend\models\Tblcolor;
use backend\models\Tblexist;
use backend\models\Tblgallery;
use backend\models\Tblsize;
use backend\models\TbltypeProduct;
use backend\models\Upload;
use common\components\jdf;
use Yii;
use backend\models\Tblproduct;
use backend\models\TblproductSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Tblproduct model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
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
     * Lists all Tblproduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblproductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblproduct model.
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
     * Creates a new Tblproduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblproduct();
        $ff=TblcategoryProduct::find()->where(['enabel_view'=>1])->all();
        $name=ArrayHelper::map($ff,'id','name');
        $type=ArrayHelper::map(TbltypeProduct::find()->where(['enabel_view'=>1])->all(),'id','type');
        $brand=ArrayHelper::map(Tblbrand::find()->where(['enabel_view'=>1])->all(),'id','brand');
        $img=ArrayHelper::map(Tblgallery::find()->all(),'id','title');
        $modelf = new Upload();

        if ($model->load(Yii::$app->request->post()) ) {
           
            $modelf->image = UploadedFile::getInstance($modelf,'image');
            if ($modelf->validate()) {
                $modelf->image->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf->image->baseName . '.' . $modelf->image->extension);
                $model->img=$modelf->image->baseName . '.' . $modelf->image->extension;
                $data = new jdf();
                $time=explode("/",$_POST['time']);
                $d=$time[0];
                $m=$time[1];
                $y=$time[2];

                $model->time_ir=$y.'/'.$m.'/'.$d;
                $time2=$data->jalaliToGregorian($y,$m,$d);

                $Y=$time2[0].'/';
                $M=$time2[1].'/';
                $D=$time2[2];
                $g=$Y.$M.$D;

                $model->time=date($g);

                $model->save();

            } else {
                return $this->render('create', [
                    'model' => $model,
                    'name'=>$name,
                    'type'=>$type,
                    'brand'=>$brand,
                    'img'=> $img,
                    'modelf'=>$modelf,
                ]);
            }




            foreach (explode(",",$model->size) as $item){
                $size=new Tblsize();
                $size->id_pro=$model->id;
                $size->size=$item;
                $size->save();
        }
  


//            ایجاد موجودی

        $modelS=Tblsize::find()->where(['id_pro'=>$model->id])->all();
            foreach ($modelS as $ms){

                $modelC=Tblcolor::find()->where(['id_pro'=>$model->id])->all();
                foreach ($modelC as $mc){
                    $mojodi= new Tblexist();
                    $mojodi->id_pro=$model->id;
                    $mojodi->id_size=$ms->id;
                    $mojodi->id_color=$mc->id;
                    $mojodi->save();

                }
            }

//var_dump($model->getErrors());exit;
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'name'=>$name,
                'type'=>$type,
                'brand'=>$brand,
                'img'=> $img,
                'modelf'=>$modelf,


            ]);
        }
    }

    /**
     * Updates an existing Tblproduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $name=ArrayHelper::map(TblcategoryProduct::find()->where(['enabel_view'=>1])->all(),'id','name');
        $type=ArrayHelper::map(TbltypeProduct::find()->where(['enabel_view'=>1])->all(),'id','type');
        $brand=ArrayHelper::map(Tblbrand::find()->where(['enabel_view'=>1])->all(),'id','brand');
        $img=ArrayHelper::map(Tblgallery::find()->all(),'id','title');
        $modelf = new upload();
        if ($model->load(Yii::$app->request->post())) {

            $modelf->image = UploadedFile::getInstance($modelf,'image');
            if($modelf->image==null){
                $data = new jdf();
                $time=explode("/",$_POST['time']);
                $d=$time[0];
                $m=$time[1];
                $y=$time[2];

                $model->time_ir=$y.'/'.$m.'/'.$d;
                $time2=$data->jalaliToGregorian($y,$m,$d);

                $Y=$time2[0].'/';
                $M=$time2[1].'/';
                $D=$time2[2];
                $g=$Y.$M.$D;

                $model->time=date($g);
                $model->save();
            }else{
                if ($modelf->validate()) {
                    $modelf->image->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf->image->baseName . '.' . $modelf->image->extension);
                    $model->img=$modelf->image->baseName . '.' . $modelf->image->extension;
                    $data = new jdf();
                    $time=explode("/",$_POST['time']);
                    $d=$time[0];
                    $m=$time[1];
                    $y=$time[2];

                    $model->time_ir=$y.'/'.$m.'/'.$d;
                    $time2=$data->jalaliToGregorian($y,$m,$d);

                    $Y=$time2[0].'/';
                    $M=$time2[1].'/';
                    $D=$time2[2];
                    $g=$Y.$M.$D;

                    $model->time=date($g);

                    $model->save();

                } else {
                    return $this->render('create', [
                        'model' => $model,
                        'name'=>$name,
                        'type'=>$type,
                        'brand'=>$brand,
                        'img'=> $img,
                        'modelf'=>$modelf,
                    ]);
                }
            }
            
            $modelsize=Tblsize::find()->where(['id_pro'=>$model->id])->all();
            foreach ($modelsize as $item1){
                $item1->enabel_view= 0;
                $item1->save();

            }

            foreach (explode(",",$model->size) as $item){
                $size=new Tblsize();
                $size->id_pro=$model->id;
                $size->size=$item;
                $size->save();
            }

            

            return $this->redirect(['view', 'id' => $model->id]);
        } else {



            $size=Tblsize::find()->where(['id_pro'=>$id])->andWhere(['enabel_view'=>1])->all();
            $size_pro=[];
            $i=0;
            foreach ($size as $s){
                $size_pro[$i]=$s->size;
                $i++;
            }
            $model->size=implode(',',$size_pro);



            
            return $this->render('update', [
                'model' => $model,
                'name'=>$name,
                'type'=>$type,
                'brand'=>$brand,
                'img'=> $img,
                'modelf'=>$modelf,


            ]);
        }
    }

    /**
     * Deletes an existing Tblproduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $modelsize=Tblsize::find()->where(['id_pro'=>$model->id])->all();
        if($modelsize!=null){
            foreach ($modelsize as $ms){
                $ms->enabel_view=0;
                $ms->update();
            }
        }

        $modelcolor=Tblcolor::find()->where(['id_pro'=>$model->id])->all();
        if($modelcolor!=null){
            foreach ($modelcolor as $mc){
                $mc->enabel_view=0;
                $mc->update();
            }
        }

        $modelexist=Tblexist::find()->where(['id_pro'=>$model->id])->all();
        if($modelexist!=null){
            foreach ($modelexist as $me){
                $me->enabel_view=0;
                if(!$me->update()){
             
                    exit;
                }
            }
        }

        $model->enabel_view =0;
        $model->size='0';
        $model->update();
     

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tblproduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblproduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblproduct::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
