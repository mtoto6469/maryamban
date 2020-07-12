<?php

namespace backend\controllers;

use common\components\jdf;
use Yii;
use backend\models\Tblprofile;
use backend\models\TblprofileSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
use frontend\models\Tblbag;
use backend\models\TblSodorFactor;

/**
 * ProfileController implements the CRUD actions for Tblprofile model.
 */
class ProfileController extends Controller
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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }



public function actionList($id)
    {
        $model=Tblprofile::findOne($id);
        $bag=Tblbag::find()->where(['enable_view'=>1])->andWhere(['id_user'=>$model->user_id])->andWhere(['down_buy'=>0])->all();
            $bag2=TblSodorFactor::find()->where(['id_user'=>$model->user_id])->all();
            
        return $this->render('list', [
            'bag' => $bag,
            'bag2' => $bag2,
        ]);
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
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $credit=$model->credit;
        // var_dump($credit);exit;
        $user=User::find()->where(['id'=>$model->user_id])->one();
        if ($model->load(Yii::$app->request->post())  ) {


            if($model->cre==null){
       
            //   $model->mande=$model->mande+$model->cre;  
            }else{
               
                $model->credit=$model->credit+$model->cre;
                
                $model->mande=$model->mande+$model->cre;
            }
            
            $data = new jdf();
            $time=explode("/",$_POST['time']);
            $y=$time[2];
            $m=$time[1];
            $d=$time[0];

            $time2=$data->jalaliToGregorian($y,$m,$d);

            $Y=$time2[0].'/';
            $M=$time2[1].'/';
            $D=$time2[2];
            $g=$Y.$M.$D;

            $model->date_credit=date($g);
           
                if($model->password!=null){
                     $user->setPassword($model->password);
                }
            $user->username=$_POST['Tblprofile']['username'];
           
            
            $user->save();

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $date= new jdf();
            $time=explode('-',$model->date_credit);
             $y=$time[0];
             $m=$time[1];
             $d=$time[2];
            $ir=$date->gregorianToJalali($y,$m,$d,$mod='');
         
            $date_ir= $ir[2].'/'.$ir[1].'/'. $ir[0];
            return $this->render('update', [
                'model' => $model,
                'date_ir'=>$date_ir,
               
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
        $model=$this->findModel($id);
        $user=User::find()->where(['id'=>$model->user_id])->one();
        
        $user->delete();
       $model->delete();

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
