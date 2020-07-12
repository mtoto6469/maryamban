<?php

namespace backend\controllers;

use backend\models\Tblgallery;
use common\components\jdf;
use Yii;
use backend\models\Tblpost;
use backend\models\TblpostSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Tblpost model.
 */
class PostController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'delete','update','view','create'],
                'rules' => [

                    [
                        'actions' => ['index', 'delete','update','view','create'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [

                ],
            ],
        ];
    }

    /**
     * Lists all Tblpost models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblpostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$flag=1);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionGhaleb_post()
    {  
        
        $model = new Tblpost();
        if ($model->load(Yii::$app->request->post())) {
            return $this->redirect(['create', 'id_group' => $model->id_group]);
        }
        return $this->render('ghaleb_post',[
            'model' => $model,
        ]);
    }
    public function actionCreate()
    {
        $model = new Tblpost();
        $img=ArrayHelper::map(Tblgallery::find()->all(),'id','address');
        $model->type=1;// for post
//        $model->id_group=$id_group; // for post template
        if ($model->load(Yii::$app->request->post()) ) {

            $data = new jdf();
            $model->time = date('Y/m/d');
            $model->time_ir = $data->date('y/m/d');
            $model->user_id=Yii::$app->user->getId();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'img'=>$img,
            ]);
        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $img=ArrayHelper::map(Tblgallery::find()->all(),'id','address');

        if ($model->load(Yii::$app->request->post())) {
            $data = new jdf();
            $model->time = date('Y/m/d');
            $model->time_ir = $data->date('y/m/d');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'img'=>$img,

            ]);
        }
    }

    /**
     * Deletes an existing Tblpost model.
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
     * Finds the Tblpost model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblpost the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblpost::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
