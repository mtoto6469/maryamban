<?php

namespace frontend\controllers;

use frontend\models\Tblbag;
use frontend\models\Tblproduct;
use frontend\models\Tblsize;
use frontend\models\TblSodorFactor;
use Yii;
use frontend\models\Tblreplace;
use frontend\models\TblreplaceSearch;
use yii\helpers\ArrayHelper;
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
    public $enableCsrfValidation = false;
    public $layout = 'profile.php';

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



    public function actionView2($id)
    {
        return $this->render('view2', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionList()
    {
        $fac = TblSodorFactor::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['resive' => 1])->andWhere(['confirm' => 1])->all();

        return $this->render('list', [
            'fac' => $fac,
        ]);
    }


    /**
     * Creates a new Tblreplace model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_fac, $id_pro,$id_bag)
    {
        $model = new Tblreplace();
        $pro = \frontend\models\Tblproduct::find()->where(['id' => $id_pro])->one();
        $b=Tblbag::find()->where(['id'=>$id_bag])->one();
        if($b->size==0){
            $size=ArrayHelper::map(Tblsize::find()->where(['id_pro'=>$b->id_pro])->andWhere(['enabel_view'=>1])->all(),'size','size');
        }else{
            $size[$b->size]=$b->size;
        }
        
        if ($model->load(Yii::$app->request->post())) {

            $model->id_fac = $id_fac;
            $model->id_pro = $id_pro;
            $model->id_bag = $id_bag;
            $model->id_user = Yii::$app->user->getId();

         
                $model->new_count=$_POST['Tblreplace']['new_count'];

                if($model->new_size == null){
                    exit;
                    $model->new_siz=0;
                    $model->save();
                }else{
                    $model->save();
                }
            

            return $this->redirect(['view', 'id' => $model->id]);


        } else {
            return $this->render('create', [
                'model' => $model,
                'pro'=>$pro,
                'b'=>$b,
                'size'=>$size,
            ]);
        }
    }

    /**
     * Updates an existing Tblreplace model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pro = \frontend\models\Tblproduct::find()->where(['id' => $model->id_pro])->one();
        $b=Tblbag::find()->where(['id'=>$model->id_bag])->one();
        if($b->size==0){
            $size=ArrayHelper::map(Tblsize::find()->where(['id_pro'=>$b->id_pro])->andWhere(['enabel_view'=>1])->all(),'size','size');
        }else{
            $size[$b->size]=$b->size;
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->new_count=$_POST['Tblreplace']['new_count'];

            if($model->new_size == null){

                $model->new_size=0;
                $model->save();
            }else{
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);


        } else {
            return $this->render('create', [
                'model' => $model,
                'pro'=>$pro,
                'b'=>$b,
                'size'=>$size,

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
