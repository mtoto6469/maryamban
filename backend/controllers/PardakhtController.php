<?php

namespace backend\controllers;

use backend\models\Tblbrand;
use backend\models\Tblexist;
use backend\models\Tblproduct;
use backend\models\Tblprofile;
use common\components\jdf;
use common\models\User;
use frontend\models\Tblallpost;
use frontend\models\Tblbag;
use frontend\models\TblSodorFactor;
use Yii;
use backend\models\Tblpardakht;
use backend\models\TblpardakhtSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PardakhtController implements the CRUD actions for Tblpardakht model.
 */
class PardakhtController extends controller
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
     * Lists all Tblpardakht models.
     * @return mixed
     */
    public function actionIndex($flag)
    {
        $searchModel = new TblpardakhtSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$flag);

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
        $model=$this->findModel($id);
        return $this->render('view', [
            'model' => $model,
            
        ]);
    }

    /**
     * Creates a new Tblpardakht model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model=$this->findModel($id);
        $fac=0;
        $user=User::find()->where(['id'=>$model->id_user])->one();
        if($model->id_fac==0){
            $model->enabel_view='0';
            $model->approve=0;
            $model->save();
            if ($model->load(Yii::$app->request->post()) ) {
                $model->save();
                return $this->redirect(['index','flag'=>1]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'fac'=>$fac,
                    'user'=>$user,
                ]);
            }


        }else{
            $fac=\backend\models\TblSodorFactor::find()->where(['id'=>$model->id_fac])->one();
            $user=User::find()->where(['id'=>$fac->id_user])->one();
            $model->enabel_view='0';
            $model->save();
            $fac->confirm=3;
            $bag=Tblbag::find()->where(['id_fac'=>$fac->id])->all();

            foreach ($bag as $b){
                $count=0;
                $p=Tblproduct::find()->where(['id'=>$b->id_pro])->one();
                $ex=Tblexist::find()->where(['id_pro'=>$p->id])->andWhere(['size'=>$b->size])->andWhere(['color'=>$b->color])->one();


                if($ex){

                    $count=$b->count;

                }
                $ex->exist=$count;
                 $ex->save();
            }
           
            $fac->save();
            $bag=Tblbag::find()->where(['id_fac'=>$fac->id])->all();
            foreach ($bag as $b){
                $b->id_fac=0;
                $b->down_buy=0;
                $b->save();
            }
            $allpost=\backend\models\Tblallpost::find()->where(['id_fac'=>$fac->id])->all();
            foreach ($allpost as $al){
                $al->id_fac=0;
                $al->down_buy=0;
                $al->save();
            }

            if ($model->load(Yii::$app->request->post()) ) {
                $model->save();
                return $this->redirect(['index','flag'=>3]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'fac'=>$fac,
                    'user'=>$user,
                ]);
            }

        }




    }

    /**
     * Updates an existing Tblpardakht model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model->id_fac==0){

            $model->approve=1;
            $model->enabel_view=0;
            $model->save();
            $profile=Tblprofile::find()->where(['user_id'=>$model->id_user])->one();
            $profile->credit=$model->price;
            $profile->mande=$profile->mande+$model->price;
//            $data = new jdf();
//            $time=explode("/",$model->date_u);
//            $d=$time[0];
//            $m=$time[1];
//            $y=$time[2];
//
//            $time2=$data->jalaliToGregorian($y,$m,$d);
//
//            $Y=$time2[0].'/';
//            $M=$time2[1].'/';
//            $D=$time2[2];
//            $g=$Y.$M.$D;
//            $profile->date_credit=date($g);
            $profile->save();
            return $this->redirect(['index','flag'=>1]);
        }else{


            $fac=\backend\models\TblSodorFactor::find()->where(['id'=>$model->id_fac])->one();
            $model->enabel_view=0;
            $model->save();
            $fac->confirm=1;
            $fac->print=0;
            if($fac->save()){
                return $this->redirect(['factor/index','visibel'=>0,'resive'=>0,'print'=>0]);

            }

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
        $model=$this->findModel($id);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tblpardakht model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblpardakht the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblpardakht::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
