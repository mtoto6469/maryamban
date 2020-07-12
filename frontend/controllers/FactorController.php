<?php

namespace frontend\controllers;

use frontend\models\Tblallpost;
use Yii;
use frontend\models\TblSodorFactor;
use frontend\models\TblSodorFactorSearch;
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
    public $layout='profile.php';
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
     * Lists all TblSodorFactor models.
     * @return mixed
     */
    public function actionIndex($flag)
    {

        $searchModel = new TblSodorFactorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$flag);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



//    public function actionChenge($id)
//    {
//        $model= $this->findModel($id);
//        $time = date_create($model->date_deliver);
//
//        date_add($time, date_interval_create_from_date_string("4 days"));
//        $date = strtotime(date_format($time, "Y-m-d"));
//
//        $today_date = strtotime(date('Y/m/d'));
//
//        if ($today_date >= $date) {
//            
//            $_SESSION['error5']='اجازه تعویض وجود ندارد';
//            
//            $searchModel = new TblSodorFactorSearch();
//            $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$flag=0);
//            return $this->render('index', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//
//        }else{
//            return $this->redirect(['replace/create', 
//                'id'=>$model->id,
//
//            ]);
//        }
//
//
//    }


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
     * Deletes an existing TblSodorFactor model.
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
