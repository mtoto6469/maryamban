<?php

namespace frontend\controllers;

use common\models\User;
use frontend\models\ContactForm;
use frontend\models\Tblbag;
use frontend\models\Tblmessage;
use frontend\models\TblSodorFactor;
use Yii;
use frontend\models\Tblprofile;
use frontend\models\TblprofileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfileController implements the CRUD actions for Tblprofile model.
 */
class ProfileController extends Controller
{
    /**
     * @inheritdoc
     */
    public $enableCsrfValidation = false;

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
     * Lists all Tblprofile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout="profile.php";
        $searchModel = new TblprofileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblprofile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model=$this->findModel($id);
        $user=User::find()->where(['id'=>$model->user_id])->one();
        $model->username=$user->username;
        $this->layout="profile.php";
        return $this->render('view', [
            'model' => $model,
        ]);
    }


    /**
     * @return mixed
     */
    public function actionSetting()
     {

             $this->layout = "profile";
                
                return $this->render('index');
         }


    public function actionAbout()

    {

        $this->layout="profile.php";
        return $this->render('about');
    }


    public function actionContact()
    {
        $this->layout="profile.php";
        $mess=new Tblmessage();
        if ($mess->load(Yii::$app->request->post()) && $mess->save()) {
            return $this->redirect(['setting']);
        }
        else{
//            var_dump($mess->getErrors());
//            exit;
            return $this->render('contact',[
                'message'=>$mess
            ]);

        }
    }


    public function actionGallery()

    {

        $this->layout="profile.php";
        return $this->render('gallery');
    }

    /**
     * Creates a new Tblprofile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblprofile();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tblprofile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionTest($id)
    {
        $this->layout="profile.php";
        
        $model = $this->findModel($id);



        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        
        $user=Tblprofile::find()->where(['user_id'=>Yii::$app->user->getId()])->one();
        $id=$user->id;
        $model = $this->findModel($id);
        $user=User::find()->where(['id'=>$model->user_id])->one();

        if ($model->load(Yii::$app->request->post()) ) {

        $user->username=$model->username;
            $user->setPassword($model->password);
             $user->save();

        $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->username=$user->username;

//            $model->password=$user->password;
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tblprofile model.
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
     * Finds the Tblprofile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblprofile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblprofile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
