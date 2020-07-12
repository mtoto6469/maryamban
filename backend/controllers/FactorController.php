<?php

namespace backend\controllers;

use backend\models\Tblallpost;
use common\components\jdf;
use frontend\models\Tblbag;
use Yii;
use backend\models\TblSodorFactor;
use backend\models\TblSodorFactorSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FactorController implements the CRUD actions for TblSodorFactor model.
 */
class FactorController extends Controller
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
                    // 'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TblSodorFactor models.
     * @return mixed
     */
    public function actionIndex($resive,$visibel,$print)
    {
        $searchModel = new TblSodorFactorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$resive,$visibel,$print);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblSodorFactor model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model= $this->findModel($id);
       $allpost=Tblallpost::find()->where(['id_fac'=>$id])->all();
        
        
        return $this->render('view', [
            'model'=>$model,
            'allpost'=>$allpost,
        ]);
    }

    /**
     * Creates a new TblSodorFactor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblSodorFactor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblSodorFactor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$resive,$visibel,$print)
    {

        $model = $this->findModel($id);

        if($resive==0 && $visibel==0){

         $model->visibel=1;
            $visibel1=1;
            $resive1=0;
$print1=0;
            $model->save();
        }
        if($resive==0 && $visibel==1 && $print==1){

            $model->resive=1;
            $resive1=1;
            $visibel1=1;
            $print1=1;
            $model->date_deliver = date('Y/m/d');
            $model->save();
        }


        if($resive==0 && $visibel==1 && $print==0){

            $model->print= 1;
            $model->save();
            $print1=0;
        }

        return $this->redirect(['index',
            'resive'=>$resive,
            'visibel'=>$visibel,
            'print'=>$print1,
            
        ]);

    }




    public function actionBack_resive($id)
    {

        $model = $this->findModel($id);
            $model->resive=0;
            $model->save();


        return $this->redirect(['index',
            'resive'=>$model->visibel,
            'visibel'=>$model->visibel,
            'print'=>$model->print,

        ]);

    }




    /**
     * Deletes an existing TblSodorFactor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index',
            'resive'=>1,
            'visibel'=>1,
            'print'=>1,
        ]);
    }


 

    /**
     * Finds the TblSodorFactor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblSodorFactor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblSodorFactor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
