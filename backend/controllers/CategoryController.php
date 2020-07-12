<?php

namespace backend\controllers;

use Yii;
use backend\models\Tblcategory;
use backend\models\TblcategorySearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Tblcategory model.
 */
class CategoryController extends Controller
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

    public function actionIndex()
    {
        $searchModel = new TblcategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionInit()
    {

        $auth = Yii::$app->authManager;
        $admin = $auth->createRole('admin');
        $auth->add( $admin);
//        $auth->assign($admin, 1);
        $user = $auth->createRole('user');
        $auth->add( $user);
//        $auth->assign($user, 2);
        $costumer = $auth->createRole('costumer');
        $auth->add( $costumer);
//        $auth->assign($costumer, 3);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new Tblcategory();

        $item=Tblcategory::find()->andFilterWhere(['!=','title_category','محصولات'])->all();
        $itemcat=ArrayHelper::map($item,'id_category','title_category');
        if ($model->load(Yii::$app->request->post()) ) {

            if($model->id_parent==null){
                $model->id_parent=0;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_category]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'itemcat'=>$itemcat,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $item=Tblcategory::find()->all();
        $itemcat=ArrayHelper::map($item, 'id_category','title_category');
        if ($model->load(Yii::$app->request->post()) ) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_category]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'itemcat'=>$itemcat,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Tblcategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    
}
