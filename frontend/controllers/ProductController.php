<?php

namespace frontend\controllers;

use frontend\models\Tblbrand;
use frontend\models\TblcategoryProduct;
use frontend\models\TbltypeProduct;
use Yii;
use frontend\models\Tblproduct;
use frontend\models\TblproductSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
                'only' => ['logout', 'signup','details','pack_details'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['details'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['pack_details'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],



                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'delete' => ['GET'],
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }



    public function actionCategory($id)
    {
        $cat_pro=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $brand=\frontend\models\Tblbrand::find()->where(['enabel_view'=>1])->all();
        $type=\frontend\models\TbltypeProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $category=TblcategoryProduct::find()->where(['id'=>$id])->one();
            return $this->render('category', [
                'category' => $id,
                'cat_pro'=>$cat_pro,
                'type'=>$type,
                'brand'=>$brand,
                'category'=>$category,


            ]);
    }



    public function actionType($id)
    {
        $cat_pro=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $brand=\frontend\models\Tblbrand::find()->where(['enabel_view'=>1])->all();
        $type=\frontend\models\TbltypeProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $type_pro=TbltypeProduct::find()->where(['id'=>$id])->one();
        
        return $this->render('type', [
            'category' => $id,
            'cat_pro'=>$cat_pro,
            'type'=>$type,
            'brand'=>$brand,
            'type_pro'=>$type_pro,


        ]);
    }





    public function actionBrand($id)
    {
        $cat_pro=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $brand=\frontend\models\Tblbrand::find()->where(['enabel_view'=>1])->all();
        $type=\frontend\models\TbltypeProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $brand_pro=Tblbrand::find()->where(['id'=>$id])->one();
        return $this->render('brand', [
            'category' => $id,
            'cat_pro'=>$cat_pro,
            'type'=>$type,
            'brand'=>$brand,
            'brand_pro'=>$brand_pro,


        ]);
    }
    

    /**
     * Deletes an existing Tblproduct model.
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
