<?php

namespace backend\controllers;

use backend\models\gallery;
use backend\models\Upload;
use frontend\models\UploadForm;
use Yii;
use backend\models\Tblcolor;
use backend\models\TblcolorSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ColorController implements the CRUD actions for Tblcolor model.
 */
class ColorController extends Controller
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
     * Lists all Tblcolor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblcolorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblcolor model.
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
     * Creates a new Tblcolor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Tblcolor();
        $modelf = new Upload();

        if ($model->load(Yii::$app->request->post())) {

            $modelf->image = UploadedFile::getInstance($modelf,'image');

            if ($modelf->validate()) {
                $modelf->image->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf->image->baseName . '.' . $modelf->image->extension);
                if($id!=0){
                    $model->id_pro=$id;
                    $model->img=$modelf->image->baseName . '.' . $modelf->image->extension;
                    $model->save();

                }else{
                    $model->img=$modelf->image->baseName . '.' . $modelf->image->extension;
                    $model->save();
                }

                return $this->redirect(['view','id'=>$model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'modelf'=>$modelf,
                ]);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelf'=> $modelf,
            ]);
        }

    }
 

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelf = new upload();
        if ($model->load(Yii::$app->request->post()) ) {


            $modelf->image = UploadedFile::getInstance($modelf,'image');
            if($modelf->image==null){
                $model->save();
            }else{
                if ($modelf->validate()) {
                    $modelf->image->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf->image->baseName . '.' . $modelf->image->extension);
                    $model->img=$modelf->image->baseName . '.' . $modelf->image->extension;
                    $model->save();

                } else {
                    return $this->render('update', [
                        'model' => $model,
                        'modelf'=>$modelf,

                    ]);
                }
            }


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelf'=>$modelf,

            ]);
        }
    }

    /**
     * Deletes an existing Tblcolor model.
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
     * Finds the Tblcolor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblcolor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblcolor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
